<?php namespace Tests\Repositories;

use App\Models\Base\VendorExpeditionTrip;
use App\Repositories\Base\VendorExpeditionTripRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorExpeditionTripRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorExpeditionTripRepository
     */
    protected $vendorExpeditionTripRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vendorExpeditionTripRepo = \App::make(VendorExpeditionTripRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->make()->toArray();

        $createdVendorExpeditionTrip = $this->vendorExpeditionTripRepo->create($vendorExpeditionTrip);

        $createdVendorExpeditionTrip = $createdVendorExpeditionTrip->toArray();
        $this->assertArrayHasKey('id', $createdVendorExpeditionTrip);
        $this->assertNotNull($createdVendorExpeditionTrip['id'], 'Created VendorExpeditionTrip must have id specified');
        $this->assertNotNull(VendorExpeditionTrip::find($createdVendorExpeditionTrip['id']), 'VendorExpeditionTrip with given id must be in DB');
        $this->assertModelData($vendorExpeditionTrip, $createdVendorExpeditionTrip);
    }

    /**
     * @test read
     */
    public function test_read_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();

        $dbVendorExpeditionTrip = $this->vendorExpeditionTripRepo->find($vendorExpeditionTrip->id);

        $dbVendorExpeditionTrip = $dbVendorExpeditionTrip->toArray();
        $this->assertModelData($vendorExpeditionTrip->toArray(), $dbVendorExpeditionTrip);
    }

    /**
     * @test update
     */
    public function test_update_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();
        $fakeVendorExpeditionTrip = VendorExpeditionTrip::factory()->make()->toArray();

        $updatedVendorExpeditionTrip = $this->vendorExpeditionTripRepo->update($fakeVendorExpeditionTrip, $vendorExpeditionTrip->id);

        $this->assertModelData($fakeVendorExpeditionTrip, $updatedVendorExpeditionTrip->toArray());
        $dbVendorExpeditionTrip = $this->vendorExpeditionTripRepo->find($vendorExpeditionTrip->id);
        $this->assertModelData($fakeVendorExpeditionTrip, $dbVendorExpeditionTrip->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();

        $resp = $this->vendorExpeditionTripRepo->delete($vendorExpeditionTrip->id);

        $this->assertTrue($resp);
        $this->assertNull(VendorExpeditionTrip::find($vendorExpeditionTrip->id), 'VendorExpeditionTrip should not exist in DB');
    }
}
