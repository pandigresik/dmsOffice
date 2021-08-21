<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\AccountJournal;

class AccountJournalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_journal()
    {
        $accountJournal = AccountJournal::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/account_journals', $accountJournal
        );

        $this->assertApiResponse($accountJournal);
    }

    /**
     * @test
     */
    public function test_read_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/account_journals/'.$accountJournal->id
        );

        $this->assertApiResponse($accountJournal->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();
        $editedAccountJournal = AccountJournal::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/account_journals/'.$accountJournal->id,
            $editedAccountJournal
        );

        $this->assertApiResponse($editedAccountJournal);
    }

    /**
     * @test
     */
    public function test_delete_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/account_journals/'.$accountJournal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/account_journals/'.$accountJournal->id
        );

        $this->response->assertStatus(404);
    }
}
