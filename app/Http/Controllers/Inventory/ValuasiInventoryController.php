<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Inventory\ProductStockRepository;
use Illuminate\Http\Request;
use Response;

class ValuasiInventoryController extends AppBaseController
{
    /** @var ProductStockRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductStockRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {            
            $period = generatePeriodFromString($request->get('period'));
            $branchId = $request->get('branch_id') ?? [];
            $startDate = $period['startDate'];
            $endDate = $period['endDate'];
            $product = $request->get('product') ?? [];
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId, $product);
            
            return view('inventory.valuasi_inventory.list')                
                ->with(['datas' => $datas, 'startDate' => $startDate, 'endDate' => $endDate, 'branch' => $branchId]);
        }

        // $downloadXls = $request->get('download_xls');
        // if ($downloadXls) {
        //     $period = explode(' - ', $request->get('period_range'));
        //     $branchId = $request->get('branch_id') ?? [];
        //     $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
        //     $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
        //     $priceChoice = $request->get('price_choice');
        //     $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId, $priceChoice);

        //     return $this->exportExcel($startDate, $endDate, $datas, $branchId);
        // }

        return view('inventory.valuasi_inventory.index')->with($this->getOptionItems());
    }
    

    /**
     * Provide options item based on relationship model ProfitLoss from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());
        $user = \Auth::user();
        return [
            'branchItems' => config('entity.gudangPusat')[$user->entity_id] + $branch->pluck([], null, null, 'szId', 'szName'),            
        ];
    }
        
}
