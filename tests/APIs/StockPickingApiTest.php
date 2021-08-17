<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Inventory\StockPicking;

class StockPickingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_picking()
    {
        $stockPicking = StockPicking::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inventory/stock_pickings', $stockPicking
        );

        $this->assertApiResponse($stockPicking);
    }

    /**
     * @test
     */
    public function test_read_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_pickings/'.$stockPicking->id
        );

        $this->assertApiResponse($stockPicking->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();
        $editedStockPicking = StockPicking::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inventory/stock_pickings/'.$stockPicking->id,
            $editedStockPicking
        );

        $this->assertApiResponse($editedStockPicking);
    }

    /**
     * @test
     */
    public function test_delete_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inventory/stock_pickings/'.$stockPicking->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_pickings/'.$stockPicking->id
        );

        $this->response->assertStatus(404);
    }
}
