<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Inventory\StockQuant;

class StockQuantApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_quant()
    {
        $stockQuant = StockQuant::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inventory/stock_quants', $stockQuant
        );

        $this->assertApiResponse($stockQuant);
    }

    /**
     * @test
     */
    public function test_read_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_quants/'.$stockQuant->id
        );

        $this->assertApiResponse($stockQuant->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();
        $editedStockQuant = StockQuant::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inventory/stock_quants/'.$stockQuant->id,
            $editedStockQuant
        );

        $this->assertApiResponse($editedStockQuant);
    }

    /**
     * @test
     */
    public function test_delete_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inventory/stock_quants/'.$stockQuant->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inventory/stock_quants/'.$stockQuant->id
        );

        $this->response->assertStatus(404);
    }
}
