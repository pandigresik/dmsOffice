<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\VendorExpedition;

class VendorExpeditionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/vendor_expeditions', $vendorExpedition
        );

        $this->assertApiResponse($vendorExpedition);
    }

    /**
     * @test
     */
    public function test_read_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expeditions/'.$vendorExpedition->id
        );

        $this->assertApiResponse($vendorExpedition->toArray());
    }

    /**
     * @test
     */
    public function test_update_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();
        $editedVendorExpedition = VendorExpedition::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/vendor_expeditions/'.$vendorExpedition->id,
            $editedVendorExpedition
        );

        $this->assertApiResponse($editedVendorExpedition);
    }

    /**
     * @test
     */
    public function test_delete_vendor_expedition()
    {
        $vendorExpedition = VendorExpedition::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/vendor_expeditions/'.$vendorExpedition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/vendor_expeditions/'.$vendorExpedition->id
        );

        $this->response->assertStatus(404);
    }
}
