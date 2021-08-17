<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Inventory\StockInventory;

class StockInventoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inventory/stock_inventories', $stockInventory
        );

        $this->assertApiResponse($stockInventory);
    }

    /**
     * @test
     */
    public function test_read_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_inventories/'.$stockInventory->id
        );

        $this->assertApiResponse($stockInventory->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();
        $editedStockInventory = StockInventory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inventory/stock_inventories/'.$stockInventory->id,
            $editedStockInventory
        );

        $this->assertApiResponse($editedStockInventory);
    }

    /**
     * @test
     */
    public function test_delete_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inventory/stock_inventories/'.$stockInventory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_inventories/'.$stockInventory->id
        );

        $this->response->assertStatus(404);
    }
}
