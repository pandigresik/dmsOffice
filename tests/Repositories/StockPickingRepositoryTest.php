<?php namespace Tests\Repositories;

use App\Models\Inventory\StockPicking;
use App\Repositories\Inventory\StockPickingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockPickingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockPickingRepository
     */
    protected $stockPickingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockPickingRepo = \App::make(StockPickingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_picking()
    {
        $stockPicking = StockPicking::factory()->make()->toArray();

        $createdStockPicking = $this->stockPickingRepo->create($stockPicking);

        $createdStockPicking = $createdStockPicking->toArray();
        $this->assertArrayHasKey('id', $createdStockPicking);
        $this->assertNotNull($createdStockPicking['id'], 'Created StockPicking must have id specified');
        $this->assertNotNull(StockPicking::find($createdStockPicking['id']), 'StockPicking with given id must be in DB');
        $this->assertModelData($stockPicking, $createdStockPicking);
    }

    /**
     * @test read
     */
    public function test_read_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();

        $dbStockPicking = $this->stockPickingRepo->find($stockPicking->id);

        $dbStockPicking = $dbStockPicking->toArray();
        $this->assertModelData($stockPicking->toArray(), $dbStockPicking);
    }

    /**
     * @test update
     */
    public function test_update_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();
        $fakeStockPicking = StockPicking::factory()->make()->toArray();

        $updatedStockPicking = $this->stockPickingRepo->update($fakeStockPicking, $stockPicking->id);

        $this->assertModelData($fakeStockPicking, $updatedStockPicking->toArray());
        $dbStockPicking = $this->stockPickingRepo->find($stockPicking->id);
        $this->assertModelData($fakeStockPicking, $dbStockPicking->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_picking()
    {
        $stockPicking = StockPicking::factory()->create();

        $resp = $this->stockPickingRepo->delete($stockPicking->id);

        $this->assertTrue($resp);
        $this->assertNull(StockPicking::find($stockPicking->id), 'StockPicking should not exist in DB');
    }
}
