<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsEntities;

class IfrsEntitiesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_entities', $ifrsEntities
        );

        $this->assertApiResponse($ifrsEntities);
    }

    /**
     * @test
     */
    public function test_read_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_entities/'.$ifrsEntities->id
        );

        $this->assertApiResponse($ifrsEntities->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();
        $editedIfrsEntities = IfrsEntities::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_entities/'.$ifrsEntities->id,
            $editedIfrsEntities
        );

        $this->assertApiResponse($editedIfrsEntities);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_entities/'.$ifrsEntities->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_entities/'.$ifrsEntities->id
        );

        $this->response->assertStatus(404);
    }
}
