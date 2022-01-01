<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsPiEmployee;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomerRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsPiSalesRepository extends DmsPiEmployeeRepository
{    
    
    public function paginate($perPage, $currentPage = 1, $columns = ['*'], $search = [])
    {
        $query = $this->allQuery();
        $query->where(['szDivisionId' => 'SALES']);
        if (!empty($search)) {
            $query->search($search['keyword'], $search['column']);
        }

        return $query->simplePaginate($perPage, $columns, 'page', $currentPage);
    }
}
