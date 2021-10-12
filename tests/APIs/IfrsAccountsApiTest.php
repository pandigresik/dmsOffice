<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsAccounts;

class IfrsAccountsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_accounts', $ifrsAccounts
        );

        $this->assertApiResponse($ifrsAccounts);
    }

    /**
     * @test
     */
    public function test_read_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_accounts/'.$ifrsAccounts->id
        );

        $this->assertApiResponse($ifrsAccounts->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();
        $editedIfrsAccounts = IfrsAccounts::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_accounts/'.$ifrsAccounts->id,
            $editedIfrsAccounts
        );

        $this->assertApiResponse($editedIfrsAccounts);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_accounts/'.$ifrsAccounts->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_accounts/'.$ifrsAccounts->id
        );

        $this->response->assertStatus(404);
    }
}
