<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\Vendor;

class VendorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_expedition()
    {
        $Vendor = Vendor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/vendor_expeditions', $Vendor
        );

        $this->assertApiResponse($Vendor);
    }

    /**
     * @test
     */
    public function test_read_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expeditions/'.$Vendor->id
        );

        $this->assertApiResponse($Vendor->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();
        $editedVendor = Vendor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/vendor_expeditions/'.$Vendor->id,
            $editedVendor
        );

        $this->assertApiResponse($editedVendor);
    }

    /**
     * @test
     */
    public function test_delete_vendor_expedition()
    {
        $Vendor = Vendor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/vendor_expeditions/'.$Vendor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expeditions/'.$Vendor->id
        );

        $this->response->assertStatus(404);
    }
}
