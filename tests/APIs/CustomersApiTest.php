<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Customers;

class CustomersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_customers()
    {
        $customers = Customers::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/customers', $customers
        );

        $this->assertApiResponse($customers);
    }

    /**
     * @test
     */
    public function test_read_customers()
    {
        $customers = Customers::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/customers/'.$customers->id
        );

        $this->assertApiResponse($customers->toArray());
    }

    /**
     * @test
     */
    public function test_update_customers()
    {
        $customers = Customers::factory()->create();
        $editedCustomers = Customers::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/customers/'.$customers->id,
            $editedCustomers
        );

        $this->assertApiResponse($editedCustomers);
    }

    /**
     * @test
     */
    public function test_delete_customers()
    {
        $customers = Customers::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/customers/'.$customers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/customers/'.$customers->id
        );

        $this->response->assertStatus(404);
    }
}
