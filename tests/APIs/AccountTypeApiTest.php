<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\AccountType;

class AccountTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_type()
    {
        $accountType = AccountType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/account_types', $accountType
        );

        $this->assertApiResponse($accountType);
    }

    /**
     * @test
     */
    public function test_read_account_type()
    {
        $accountType = AccountType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/account_types/'.$accountType->id
        );

        $this->assertApiResponse($accountType->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_type()
    {
        $accountType = AccountType::factory()->create();
        $editedAccountType = AccountType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/account_types/'.$accountType->id,
            $editedAccountType
        );

        $this->assertApiResponse($editedAccountType);
    }

    /**
     * @test
     */
    public function test_delete_account_type()
    {
        $accountType = AccountType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/account_types/'.$accountType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/account_types/'.$accountType->id
        );

        $this->response->assertStatus(404);
    }
}
