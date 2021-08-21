<?php namespace Tests\Repositories;

use App\Models\Base\VendorTrip;
use App\Repositories\Base\VendorTripRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorTripRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorTripRepository
     */
    protected $VendorTripRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->VendorTripRepo = \App::make(VendorTripRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->make()->toArray();

        $createdVendorTrip = $this->VendorTripRepo->create($VendorTrip);

        $createdVendorTrip = $createdVendorTrip->toArray();
        $this->assertArrayHasKey('id', $createdVendorTrip);
        $this->assertNotNull($createdVendorTrip['id'], 'Created VendorTrip must have id specified');
        $this->assertNotNull(VendorTrip::find($createdVendorTrip['id']), 'VendorTrip with given id must be in DB');
        $this->assertModelData($VendorTrip, $createdVendorTrip);
    }

    /**
     * @test read
     */
    public function test_read_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();

        $dbVendorTrip = $this->VendorTripRepo->find($VendorTrip->id);

        $dbVendorTrip = $dbVendorTrip->toArray();
        $this->assertModelData($VendorTrip->toArray(), $dbVendorTrip);
    }

    /**
     * @test update
     */
    public function test_update_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();
        $fakeVendorTrip = VendorTrip::factory()->make()->toArray();

        $updatedVendorTrip = $this->VendorTripRepo->update($fakeVendorTrip, $VendorTrip->id);

        $this->assertModelData($fakeVendorTrip, $updatedVendorTrip->toArray());
        $dbVendorTrip = $this->VendorTripRepo->find($VendorTrip->id);
        $this->assertModelData($fakeVendorTrip, $dbVendorTrip->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();

        $resp = $this->VendorTripRepo->delete($VendorTrip->id);

        $this->assertTrue($resp);
        $this->assertNull(VendorTrip::find($VendorTrip->id), 'VendorTrip should not exist in DB');
    }
}
