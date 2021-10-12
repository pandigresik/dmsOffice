<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsVats;

class IfrsVatsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_vats', $ifrsVats
        );

        $this->assertApiResponse($ifrsVats);
    }

    /**
     * @test
     */
    public function test_read_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_vats/'.$ifrsVats->id
        );

        $this->assertApiResponse($ifrsVats->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();
        $editedIfrsVats = IfrsVats::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_vats/'.$ifrsVats->id,
            $editedIfrsVats
        );

        $this->assertApiResponse($editedIfrsVats);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_vats/'.$ifrsVats->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_vats/'.$ifrsVats->id
        );

        $this->response->assertStatus(404);
    }
}
