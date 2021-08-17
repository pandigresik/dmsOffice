<?php namespace Tests\Repositories;

use App\Models\Inventory\StockPickingType;
use App\Repositories\Inventory\StockPickingTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockPickingTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockPickingTypeRepository
     */
    protected $stockPickingTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockPickingTypeRepo = \App::make(StockPickingTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->make()->toArray();

        $createdStockPickingType = $this->stockPickingTypeRepo->create($stockPickingType);

        $createdStockPickingType = $createdStockPickingType->toArray();
        $this->assertArrayHasKey('id', $createdStockPickingType);
        $this->assertNotNull($createdStockPickingType['id'], 'Created StockPickingType must have id specified');
        $this->assertNotNull(StockPickingType::find($createdStockPickingType['id']), 'StockPickingType with given id must be in DB');
        $this->assertModelData($stockPickingType, $createdStockPickingType);
    }

    /**
     * @test read
     */
    public function test_read_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();

        $dbStockPickingType = $this->stockPickingTypeRepo->find($stockPickingType->id);

        $dbStockPickingType = $dbStockPickingType->toArray();
        $this->assertModelData($stockPickingType->toArray(), $dbStockPickingType);
    }

    /**
     * @test update
     */
    public function test_update_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();
        $fakeStockPickingType = StockPickingType::factory()->make()->toArray();

        $updatedStockPickingType = $this->stockPickingTypeRepo->update($fakeStockPickingType, $stockPickingType->id);

        $this->assertModelData($fakeStockPickingType, $updatedStockPickingType->toArray());
        $dbStockPickingType = $this->stockPickingTypeRepo->find($stockPickingType->id);
        $this->assertModelData($fakeStockPickingType, $dbStockPickingType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_picking_type()
    {
        $stockPickingType = StockPickingType::factory()->create();

        $resp = $this->stockPickingTypeRepo->delete($stockPickingType->id);

        $this->assertTrue($resp);
        $this->assertNull(StockPickingType::find($stockPickingType->id), 'StockPickingType should not exist in DB');
    }
}
