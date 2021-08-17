<?php

namespace App\Observers;

use App\Models\Base\Product;
use App\Models\Inventory\Warehouse;
use App\Models\Inventory\StockQuant;

class WarehouseObserver
{
    /**
     * Handle the Warehouse "created" event.
     *
     * @param  \App\Models\Inventory\Warehouse  $warehouse
     * @return void
     */
    public function created(Warehouse $warehouse)
    {
        $products = Product::get(['id']);
        foreach($products as $product){
            StockQuant::create([
                'product_id' => $product->id,
                'warehouse_id' => $warehouse->id,
                'quantity' => 0,
                'uom_id' => $product->uom_id
            ]);
        }
    }

    /**
     * Handle the Warehouse "updated" event.
     *
     * @param  \App\Models\Inventory\Warehouse  $warehouse
     * @return void
     */
    public function updated(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "deleted" event.
     *
     * @param  \App\Models\Inventory\Warehouse  $warehouse
     * @return void
     */
    public function deleted(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "restored" event.
     *
     * @param  \App\Models\Inventory\Warehouse  $warehouse
     * @return void
     */
    public function restored(Warehouse $warehouse)
    {
        //
    }

    /**
     * Handle the Warehouse "force deleted" event.
     *
     * @param  \App\Models\Inventory\Warehouse  $warehouse
     * @return void
     */
    public function forceDeleted(Warehouse $warehouse)
    {
        //
    }
}
