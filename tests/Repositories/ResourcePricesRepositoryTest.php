<?php namespace Tests\Repositories;

use App\Models\ResourcePrices;
use App\Repositories\ResourcePricesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ResourcePricesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResourcePricesRepository
     */
    protected $resourcePricesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->resourcePricesRepo = \App::make(ResourcePricesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->make()->toArray();

        $createdResourcePrices = $this->resourcePricesRepo->create($resourcePrices);

        $createdResourcePrices = $createdResourcePrices->toArray();
        $this->assertArrayHasKey('id', $createdResourcePrices);
        $this->assertNotNull($createdResourcePrices['id'], 'Created ResourcePrices must have id specified');
        $this->assertNotNull(ResourcePrices::find($createdResourcePrices['id']), 'ResourcePrices with given id must be in DB');
        $this->assertModelData($resourcePrices, $createdResourcePrices);
    }

    /**
     * @test read
     */
    public function test_read_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();

        $dbResourcePrices = $this->resourcePricesRepo->find($resourcePrices->id);

        $dbResourcePrices = $dbResourcePrices->toArray();
        $this->assertModelData($resourcePrices->toArray(), $dbResourcePrices);
    }

    /**
     * @test update
     */
    public function test_update_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();
        $fakeResourcePrices = ResourcePrices::factory()->make()->toArray();

        $updatedResourcePrices = $this->resourcePricesRepo->update($fakeResourcePrices, $resourcePrices->id);

        $this->assertModelData($fakeResourcePrices, $updatedResourcePrices->toArray());
        $dbResourcePrices = $this->resourcePricesRepo->find($resourcePrices->id);
        $this->assertModelData($fakeResourcePrices, $dbResourcePrices->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();

        $resp = $this->resourcePricesRepo->delete($resourcePrices->id);

        $this->assertTrue($resp);
        $this->assertNull(ResourcePrices::find($resourcePrices->id), 'ResourcePrices should not exist in DB');
    }
}
