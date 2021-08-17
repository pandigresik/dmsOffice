<?php namespace Tests\Repositories;

use App\Models\Inventory\StockQuant;
use App\Repositories\Inventory\StockQuantRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockQuantRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockQuantRepository
     */
    protected $stockQuantRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockQuantRepo = \App::make(StockQuantRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_quant()
    {
        $stockQuant = StockQuant::factory()->make()->toArray();

        $createdStockQuant = $this->stockQuantRepo->create($stockQuant);

        $createdStockQuant = $createdStockQuant->toArray();
        $this->assertArrayHasKey('id', $createdStockQuant);
        $this->assertNotNull($createdStockQuant['id'], 'Created StockQuant must have id specified');
        $this->assertNotNull(StockQuant::find($createdStockQuant['id']), 'StockQuant with given id must be in DB');
        $this->assertModelData($stockQuant, $createdStockQuant);
    }

    /**
     * @test read
     */
    public function test_read_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();

        $dbStockQuant = $this->stockQuantRepo->find($stockQuant->id);

        $dbStockQuant = $dbStockQuant->toArray();
        $this->assertModelData($stockQuant->toArray(), $dbStockQuant);
    }

    /**
     * @test update
     */
    public function test_update_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();
        $fakeStockQuant = StockQuant::factory()->make()->toArray();

        $updatedStockQuant = $this->stockQuantRepo->update($fakeStockQuant, $stockQuant->id);

        $this->assertModelData($fakeStockQuant, $updatedStockQuant->toArray());
        $dbStockQuant = $this->stockQuantRepo->find($stockQuant->id);
        $this->assertModelData($fakeStockQuant, $dbStockQuant->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_quant()
    {
        $stockQuant = StockQuant::factory()->create();

        $resp = $this->stockQuantRepo->delete($stockQuant->id);

        $this->assertTrue($resp);
        $this->assertNull(StockQuant::find($stockQuant->id), 'StockQuant should not exist in DB');
    }
}
