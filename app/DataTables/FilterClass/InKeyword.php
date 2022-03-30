<?php

namespace App\DataTables\FilterClass;

class InKeyword
{
    private $column;

    public function __construct($name)
    {
        $this->column = $name;
    }

    public function __invoke($builder, $keyword)
    {
        $builder->whereIn($this->column, $keyword);
    }
}
