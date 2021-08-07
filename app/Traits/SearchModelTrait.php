<?php
namespace App\Traits;
trait SearchModelTrait{
    
    public function scopeSearch($query, $keyword, $columns = [], $operator = 'like', $relativeTables = [])
    {
        $query->where(function ($query) use ($keyword, $columns, $operator) {
            foreach ($columns as $key => $column) {
                $clause = $key == 0 ? 'where' : 'orWhere';
                $textSearch = $keyword;
                switch($operator){
                    case 'between':
                        $clause = $key == 0 ? 'whereBetween' : 'orWhereBetween';                        
                    case 'like_pre':
                        $textSearch = '%'.$textSearch;
                    case 'like_post':
                        $textSearch = $textSearch.'%';
                    default:
                        $textSearch = '%'.$textSearch.'%';                        
                }

                if($operator == 'between'){
                    $query->{$clause}($column, $textSearch);
                }else{
                    $query->{$clause}($column, $operator, $textSearch);
                }
                
                    
                if (!empty($relativeTables)) {
                    $this->filterByRelationship($query, $keyword, $operator, $relativeTables);
                }
            }
        });

        return $query;
    }


    private function filterByRelationship($query, $keyword, $operator, $relativeTables)
    {
        foreach ($relativeTables as $relationship => $relativeColumns) {
            $query->orWhereHas($relationship, function($relationQuery) use ($keyword, $relativeColumns, $operator) {
                foreach ($relativeColumns as $key => $column) {
                    $clause = $key == 0 ? 'where' : 'orWhere';
                    $textSearch = $keyword;
                    switch($operator){
                        case 'between':
                            $clause = $key == 0 ? 'whereBetween' : 'orWhereBetween';                        
                        case 'like_pre':
                            $textSearch = '%'.$textSearch;
                        case 'like_post':
                            $textSearch = $textSearch.'%';
                        default:
                            $textSearch = '%'.$textSearch.'%';                        
                    }

                    if($operator == 'between'){
                        $relationQuery->{$clause}($column, $textSearch);
                    }else{
                        $relationQuery->{$clause}($column, $operator, $textSearch);
                    }                    
                }
            });
        }

        return $query;
    }
}