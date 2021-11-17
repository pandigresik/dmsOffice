<?php

namespace App\Http\Controllers;

use App\Models\Inventory\DmsInvProduct;
use App\Models\Inventory\ProductPrice;
use App\Repositories\Inventory\ProductPriceRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = [];
        // \Widget::group('main')->position(3)->addAsyncWidget('revenueWidget', ['bgcolor' => 'bg-gradient-danger']);
        // \Widget::group('main')->position(5)->addAsyncWidget('revenueWidget', ['bgcolor' => 'bg-gradient-warning']);
        \Widget::group('main')->position(5)->addAsyncWidget('hutangSupplierWidget', []);
        \Widget::group('main')->position(5)->addAsyncWidget('hutangEkspedisiWidget', []);
        array_push($widgets, '<div class="row">'.\Widget::group('main')->wrap(function ($content, $index, $total) {
            // $total is a total number of widgets in a group.
            $width = intval(12 / $total);
            $classWidth = $width <= 2 ? 'col-lg-3 col-sm-6' : 'col-lg-'.$width.' col-sm-'.($width * 2 > 12 ? 12 : $width * 2);

            return "<div class='".$classWidth." widget-{$index}'>{$content}</div>";
        })->display().'</div>');
        // array_push($widgets, \AsyncWidget::run('revenueWidget', ['bgcolor' => 'bg-gradient-danger']));
        // array_push($widgets, \AsyncWidget::run('popularWidget', []));

        return view('home')->with(['widgets' => $widgets]);
    }

    public function tes(){
        $productPrice = new ProductPrice();
        $productRepo = new ProductPriceRepository(app());
        // $product = DmsInvProduct::where('iInternalId',6)->with(['productCategories'])->get();
        // //dd($product->toArray());
        // dd( [            
        //     'productItem' => $productRepo->allQuery()->disableModelCaching()->with(['dmsInvProduct' => function($q){
        //         $q->whereHas('productCategoriesProduct')->with(['productCategories']);
        //         //$q->with(['productCategories']);
        //     }])->get()->toArray(),
        // ]);

        $productPrice = new ProductPriceRepository(app());

        dd( [
            'productItems' => $productPrice
                ->allQuery()->disableModelCaching()
                ->with(['dmsInvProduct' => function ($q) {
                    $q->with(['productCategories']);
                }])
                ->get()->toArray(),
        ]);
    }
}
