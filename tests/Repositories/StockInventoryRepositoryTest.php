<?php namespace Tests\Repositories;

use App\Models\Inventory\StockInventory;
use App\Repositories\Inventory\StockInventoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockInventoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockInventoryRepository
     */
    protected $stockInventoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockInventoryRepo = \App::make(StockInventoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->make()->toArray();

        $createdStockInventory = $this->stockInventoryRepo->create($stockInventory);

        $createdStockInventory = $createdStockInventory->toArray();
        $this->assertArrayHasKey('id', $createdStockInventory);
        $this->assertNotNull($createdStockInventory['id'], 'Created StockInventory must have id specified');
        $this->assertNotNull(StockInventory::find($createdStockInventory['id']), 'StockInventory with given id must be in DB');
        $this->assertModelData($stockInventory, $createdStockInventory);
    }

    /**
     * @test read
     */
    public function test_read_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();

        $dbStockInventory = $this->stockInventoryRepo->find($stockInventory->id);

        $dbStockInventory = $dbStockInventory->toArray();
        $this->assertModelData($stockInventory->toArray(), $dbStockInventory);
    }

    /**
     * @test update
     */
    public function test_update_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();
        $fakeStockInventory = StockInventory::factory()->make()->toArray();

        $updatedStockInventory = $this->stockInventoryRepo->update($fakeStockInventory, $stockInventory->id);

        $this->assertModelData($fakeStockInventory, $updatedStockInventory->toArray());
        $dbStockInventory = $this->stockInventoryRepo->find($stockInventory->id);
        $this->assertModelData($fakeStockInventory, $dbStockInventory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_inventory()
    {
        $stockInventory = StockInventory::factory()->create();

        $resp = $this->stockInventoryRepo->delete($stockInventory->id);

        $this->assertTrue($resp);
        $this->assertNull(StockInventory::find($stockInventory->id), 'StockInventory should not exist in DB');
    }
}
