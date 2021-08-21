<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\AccountInvoice;

class AccountInvoiceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/account_invoices', $accountInvoice
        );

        $this->assertApiResponse($accountInvoice);
    }

    /**
     * @test
     */
    public function test_read_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/account_invoices/'.$accountInvoice->id
        );

        $this->assertApiResponse($accountInvoice->toArray());
    }

    /**
     * @test
     */
    public function test_update_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();
        $editedAccountInvoice = AccountInvoice::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/account_invoices/'.$accountInvoice->id,
            $editedAccountInvoice
        );

        $this->assertApiResponse($editedAccountInvoice);
    }

    /**
     * @test
     */
    public function test_delete_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/account_invoices/'.$accountInvoice->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/account_invoices/'.$accountInvoice->id
        );

        $this->response->assertStatus(404);
    }
}
