<?php namespace Tests\Repositories;

use App\Models\Accounting\AccountInvoice;
use App\Repositories\Accounting\AccountInvoiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccountInvoiceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccountInvoiceRepository
     */
    protected $accountInvoiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountInvoiceRepo = \App::make(AccountInvoiceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->make()->toArray();

        $createdAccountInvoice = $this->accountInvoiceRepo->create($accountInvoice);

        $createdAccountInvoice = $createdAccountInvoice->toArray();
        $this->assertArrayHasKey('id', $createdAccountInvoice);
        $this->assertNotNull($createdAccountInvoice['id'], 'Created AccountInvoice must have id specified');
        $this->assertNotNull(AccountInvoice::find($createdAccountInvoice['id']), 'AccountInvoice with given id must be in DB');
        $this->assertModelData($accountInvoice, $createdAccountInvoice);
    }

    /**
     * @test read
     */
    public function test_read_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();

        $dbAccountInvoice = $this->accountInvoiceRepo->find($accountInvoice->id);

        $dbAccountInvoice = $dbAccountInvoice->toArray();
        $this->assertModelData($accountInvoice->toArray(), $dbAccountInvoice);
    }

    /**
     * @test update
     */
    public function test_update_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();
        $fakeAccountInvoice = AccountInvoice::factory()->make()->toArray();

        $updatedAccountInvoice = $this->accountInvoiceRepo->update($fakeAccountInvoice, $accountInvoice->id);

        $this->assertModelData($fakeAccountInvoice, $updatedAccountInvoice->toArray());
        $dbAccountInvoice = $this->accountInvoiceRepo->find($accountInvoice->id);
        $this->assertModelData($fakeAccountInvoice, $dbAccountInvoice->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_invoice()
    {
        $accountInvoice = AccountInvoice::factory()->create();

        $resp = $this->accountInvoiceRepo->delete($accountInvoice->id);

        $this->assertTrue($resp);
        $this->assertNull(AccountInvoice::find($accountInvoice->id), 'AccountInvoice should not exist in DB');
    }
}
