<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ResourcePrices;

class ResourcePricesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/resource_prices', $resourcePrices
        );

        $this->assertApiResponse($resourcePrices);
    }

    /**
     * @test
     */
    public function test_read_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/resource_prices/'.$resourcePrices->id
        );

        $this->assertApiResponse($resourcePrices->toArray());
    }

    /**
     * @test
     */
    public function test_update_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();
        $editedResourcePrices = ResourcePrices::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/resource_prices/'.$resourcePrices->id,
            $editedResourcePrices
        );

        $this->assertApiResponse($editedResourcePrices);
    }

    /**
     * @test
     */
    public function test_delete_resource_prices()
    {
        $resourcePrices = ResourcePrices::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/resource_prices/'.$resourcePrices->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/resource_prices/'.$resourcePrices->id
        );

        $this->response->assertStatus(404);
    }
}
