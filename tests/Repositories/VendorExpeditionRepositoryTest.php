<?php namespace Tests\Repositories;

use App\Models\Base\VendorExpedition;
use App\Repositories\Base\VendorExpeditionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorExpeditionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorExpeditionRepository
     */
    protected $vendorExpeditionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vendorExpeditionRepo = \App::make(VendorExpeditionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->make()->toArray();

        $createdVendorExpedition = $this->vendorExpeditionRepo->create($vendorExpedition);

        $createdVendorExpedition = $createdVendorExpedition->toArray();
        $this->assertArrayHasKey('id', $createdVendorExpedition);
        $this->assertNotNull($createdVendorExpedition['id'], 'Created VendorExpedition must have id specified');
        $this->assertNotNull(VendorExpedition::find($createdVendorExpedition['id']), 'VendorExpedition with given id must be in DB');
        $this->assertModelData($vendorExpedition, $createdVendorExpedition);
    }

    /**
     * @test read
     */
    public function test_read_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();

        $dbVendorExpedition = $this->vendorExpeditionRepo->find($vendorExpedition->id);

        $dbVendorExpedition = $dbVendorExpedition->toArray();
        $this->assertModelData($vendorExpedition->toArray(), $dbVendorExpedition);
    }

    /**
     * @test update
     */
    public function test_update_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();
        $fakeVendorExpedition = VendorExpedition::factory()->make()->toArray();

        $updatedVendorExpedition = $this->vendorExpeditionRepo->update($fakeVendorExpedition, $vendorExpedition->id);

        $this->assertModelData($fakeVendorExpedition, $updatedVendorExpedition->toArray());
        $dbVendorExpedition = $this->vendorExpeditionRepo->find($vendorExpedition->id);
        $this->assertModelData($fakeVendorExpedition, $dbVendorExpedition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();

        $resp = $this->vendorExpeditionRepo->delete($vendorExpedition->id);

        $this->assertTrue($resp);
        $this->assertNull(VendorExpedition::find($vendorExpedition->id), 'VendorExpedition should not exist in DB');
    }
}
