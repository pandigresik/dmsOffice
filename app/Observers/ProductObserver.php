<?php

namespace App\Observers;

use App\Models\Base\Product;
use App\Models\Inventory\StockQuant;
use App\Models\Inventory\Warehouse;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Base\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $warehouse = Warehouse::get(['id']);
        foreach($warehouse as $wh){
            StockQuant::create([
                'product_id' => $product->id,
                'warehouse_id' => $wh->id,
                'quantity' => 0,
                'uom_id' => $product->uom_id
            ]);
        }        
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Base\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Base\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Base\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Base\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
