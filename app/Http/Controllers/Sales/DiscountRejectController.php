<?php

namespace App\Http\Controllers\Sales;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

use App\DataTables\Sales\BkbDiscountsDataTable;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Sales\BkbDiscountsRepository;
use App\Http\Requests\Sales\CreateBkbDiscountsRequest;
use App\Http\Requests\Sales\UpdateBkbDiscountsRequest;
use App\Models\Base\DmsPiEmployee;
use App\Models\Base\DmsSmBranch;
use App\Models\Sales\Discounts;

class DiscountRejectController extends AppBaseController
{        
    /** @var  BkbDiscountsRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BkbDiscountsRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $sales = $request->get('sales');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->listSalesReject($startDate, $endDate, $sales);                                        
            $salesMaster = DmsPiEmployee::whereIn('szId', $sales)->get()->keyBy('szId');
            return view('sales.discount_reject.list_discount')->with('datas', $datas)->with(['startDate' => $startDate, 'endDate' => $endDate, 'salesMaster' => $salesMaster]);            
        }
        return view('sales.discount_reject.index')->with($this->getOptionItems());
    }


    /**
     * Provide options item based on relationship model BkbDiscounts from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){                
        return [            
            
        ];
    }
}
