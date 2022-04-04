<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
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
        $query = JournalAccount::with(['account'])->selectRaw('date, account_id, sum(abs(balance)) balance')
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
            'data' => $data            
        ];
    }

    
    private function accountCode()
    {
        return ['130121',
            '130120',
            '311100',
            '919900',
            '130501',
            '811003',
            '811005',
            '811006',
            '824007',
            '829207',
            '824001',
            '811004',
            '824005',
            '824004',
            '824003',

            '110201',
            '110210',
        ];
    }
}
