<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\AccountAccount;

class AccountAccountApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_account()
    {
        $accountAccount = AccountAccount::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/account_accounts', $accountAccount
        );

        $this->assertApiResponse($accountAccount);
    }

    /**
     * @test
     */
    public function test_read_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/account_accounts/'.$accountAccount->id
        );

        $this->assertApiResponse($accountAccount->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();
        $editedAccountAccount = AccountAccount::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/account_accounts/'.$accountAccount->id,
            $editedAccountAccount
        );

        $this->assertApiResponse($editedAccountAccount);
    }

    /**
     * @test
     */
    public function test_delete_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/account_accounts/'.$accountAccount->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/account_accounts/'.$accountAccount->id
        );

        $this->response->assertStatus(404);
    }
}
