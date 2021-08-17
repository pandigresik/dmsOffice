<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Inventory\StockPickingType;

class StockPickingTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inventory/stock_picking_types', $stockPickingType
        );

        $this->assertApiResponse($stockPickingType);
    }

    /**
     * @test
     */
    public function test_read_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_picking_types/'.$stockPickingType->id
        );

        $this->assertApiResponse($stockPickingType->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();
        $editedStockPickingType = StockPickingType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inventory/stock_picking_types/'.$stockPickingType->id,
            $editedStockPickingType
        );

        $this->assertApiResponse($editedStockPickingType);
    }

    /**
     * @test
     */
    public function test_delete_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inventory/stock_picking_types/'.$stockPickingType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_picking_types/'.$stockPickingType->id
        );

        $this->response->assertStatus(404);
    }
}
