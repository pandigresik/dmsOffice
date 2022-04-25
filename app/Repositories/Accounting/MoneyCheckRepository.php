<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class MoneyCheckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];
    private $groupCode = 'GL';

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     */
    public function model()
    {
        return JournalAccount::class;
    }

    public function list($startDate, $endDate, $branch)
    {
        $query = JournalAccount::with(['account'])->selectRaw('date, account_id, sum(credit) credit, sum(debit) debit')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->whereIn('account_id', $this->accountCode())
            ->groupBy('account_id')
            ->groupBy('date')
            ->orderBy('date')
        ;
        if (!empty($branch)) {
            $query->where(['branch_id' => $branch]);
        }
        $data = $query->get()->groupBy('date');

        return [
            'data' => $data,
        ];
    }

    private function accountCode()
    {        
            
            
                                                                        
        return [
            '110201',
            '110210',
            '211102',            
            '130120',
            '130121',
            '130130',            
            '130131',            
            '130501',
            '311100',
            '311110',                        
            '811003',
            '811004',
            '811005',
            '811006',                        
            '821004',
            '824001',
            '824042',
            '824003',
            '824004',
            '824005',            
            '824007',
            '824019',
            '824021',
            '824037',
            '824042',
            '825012',            
            '829207',                                                                                                
            '919900',                    
        ];
    }
}
