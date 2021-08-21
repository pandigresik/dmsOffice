<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\VendorTrip;

class VendorTripApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/vendor_expedition_trips', $VendorTrip
        );

        $this->assertApiResponse($VendorTrip);
    }

    /**
     * @test
     */
    public function test_read_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expedition_trips/'.$VendorTrip->id
        );

        $this->assertApiResponse($VendorTrip->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();
        $editedVendorTrip = VendorTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/vendor_expedition_trips/'.$VendorTrip->id,
            $editedVendorTrip
        );

        $this->assertApiResponse($editedVendorTrip);
    }

    /**
     * @test
     */
    public function test_delete_vendor_expedition_trip()
    {
        $VendorTrip = VendorTrip::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/vendor_expedition_trips/'.$VendorTrip->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expedition_trips/'.$VendorTrip->id
        );

        $this->response->assertStatus(404);
    }
}
