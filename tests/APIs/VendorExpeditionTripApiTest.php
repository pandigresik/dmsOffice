<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\VendorExpeditionTrip;

class VendorExpeditionTripApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/vendor_expedition_trips', $vendorExpeditionTrip
        );

        $this->assertApiResponse($vendorExpeditionTrip);
    }

    /**
     * @test
     */
    public function test_read_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expedition_trips/'.$vendorExpeditionTrip->id
        );

        $this->assertApiResponse($vendorExpeditionTrip->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();
        $editedVendorExpeditionTrip = VendorExpeditionTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/vendor_expedition_trips/'.$vendorExpeditionTrip->id,
            $editedVendorExpeditionTrip
        );

        $this->assertApiResponse($editedVendorExpeditionTrip);
    }

    /**
     * @test
     */
    public function test_delete_vendor_expedition_trip()
    {
        $vendorExpeditionTrip = VendorExpeditionTrip::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/vendor_expedition_trips/'.$vendorExpeditionTrip->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expedition_trips/'.$vendorExpeditionTrip->id
        );

        $this->response->assertStatus(404);
    }
}
