<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\StockInventory;
use App\Repositories\BaseRepository;

/**
 * Class StockInventoryRepository.
 *
 * @version August 15, 2021, 3:22 pm UTC
 */
class StockInventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'warehouse_id',
    ];

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
        return StockInventory::class;
    }

    /**
     * Find model record for given id.
     *
     * @param int   $id
     * @param array $columns
     *
     * @return null|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $model = $this->model->newInstance($input);
            $model->save();

            $stockInventoryLine = [];
            $quantityLine = $input['stock_inventory_line_quantity'];
            $productLine = $input['stock_inventory_line_product_id'];
            $uomLine = $input['stock_inventory_line_uom_id'];
            $currentLine = $input['stock_inventory_line_current'];
            foreach ($quantityLine as $key => $quantity) {
                array_push($stockInventoryLine, new \App\Models\Inventory\StockInventoryLine([
                    'product_id' => $productLine[$key],
                    'uom_id' => $uomLine[$key],
                    'quantity' => $quantity,
                ]));
                if ($currentLine[$key] != $quantity) {
                    $diff = $quantity - $currentLine[$key];
                    // insert to stockPicking as history
                    \App\Models\Inventory\StockPicking::create([
                        'warehouse_id' => $input['warehouse_id'],
                        'stock_picking_type_id' => 1,
                        'name' => 'Adjustment Stock',
                        'quantity' => $diff,
                        'state' => 'completed',
                        'external_references' => $model->id,
                        'note' => $model->name,
                    ]);
                    // update stock quantity
                    $quant = \App\Models\Inventory\StockQuant::find($key);
                    $quant->quantity = $quantity;
                    $quant->save();
                }
            }
            $model->stockInventoryLines()->saveMany($stockInventoryLine);            
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {            
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }

        return $model;
    }
}
