<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsCategories;

class IfrsCategoriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_categories', $ifrsCategories
        );

        $this->assertApiResponse($ifrsCategories);
    }

    /**
     * @test
     */
    public function test_read_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_categories/'.$ifrsCategories->id
        );

        $this->assertApiResponse($ifrsCategories->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();
        $editedIfrsCategories = IfrsCategories::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_categories/'.$ifrsCategories->id,
            $editedIfrsCategories
        );

        $this->assertApiResponse($editedIfrsCategories);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_categories/'.$ifrsCategories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_categories/'.$ifrsCategories->id
        );

        $this->response->assertStatus(404);
    }
}
