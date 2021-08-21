<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\AccountMove;

class AccountMoveApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_move()
    {
        $accountMove = AccountMove::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/account_moves', $accountMove
        );

        $this->assertApiResponse($accountMove);
    }

    /**
     * @test
     */
    public function test_read_account_move()
    {
        $accountMove = AccountMove::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/account_moves/'.$accountMove->id
        );

        $this->assertApiResponse($accountMove->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_move()
    {
        $accountMove = AccountMove::factory()->create();
        $editedAccountMove = AccountMove::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/account_moves/'.$accountMove->id,
            $editedAccountMove
        );

        $this->assertApiResponse($editedAccountMove);
    }

    /**
     * @test
     */
    public function test_delete_account_move()
    {
        $accountMove = AccountMove::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/account_moves/'.$accountMove->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/account_moves/'.$accountMove->id
        );

        $this->response->assertStatus(404);
    }
}
