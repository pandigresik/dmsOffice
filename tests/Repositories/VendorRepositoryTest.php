<?php namespace Tests\Repositories;

use App\Models\Base\Vendor;
use App\Repositories\Base\VendorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendorRepository
     */
    protected $VendorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->VendorRepo = \App::make(VendorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vendor_expedition()
    {
        $Vendor = Vendor::factory()->make()->toArray();

        $createdVendor = $this->VendorRepo->create($Vendor);

        $createdVendor = $createdVendor->toArray();
        $this->assertArrayHasKey('id', $createdVendor);
        $this->assertNotNull($createdVendor['id'], 'Created Vendor must have id specified');
        $this->assertNotNull(Vendor::find($createdVendor['id']), 'Vendor with given id must be in DB');
        $this->assertModelData($Vendor, $createdVendor);
    }

    /**
     * @test read
     */
    public function test_read_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();

        $dbVendor = $this->VendorRepo->find($Vendor->id);

        $dbVendor = $dbVendor->toArray();
        $this->assertModelData($Vendor->toArray(), $dbVendor);
    }

    /**
     * @test update
     */
    public function test_update_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();
        $fakeVendor = Vendor::factory()->make()->toArray();

        $updatedVendor = $this->VendorRepo->update($fakeVendor, $Vendor->id);

        $this->assertModelData($fakeVendor, $updatedVendor->toArray());
        $dbVendor = $this->VendorRepo->find($Vendor->id);
        $this->assertModelData($fakeVendor, $dbVendor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();

        $resp = $this->VendorRepo->delete($Vendor->id);

        $this->assertTrue($resp);
        $this->assertNull(Vendor::find($Vendor->id), 'Vendor should not exist in DB');
    }
}
