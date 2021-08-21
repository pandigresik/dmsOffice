<?php namespace Tests\Repositories;

use App\Models\Accounting\AccountAccount;
use App\Repositories\Accounting\AccountAccountRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccountAccountRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccountAccountRepository
     */
    protected $accountAccountRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountAccountRepo = \App::make(AccountAccountRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_account()
    {
        $accountAccount = AccountAccount::factory()->make()->toArray();

        $createdAccountAccount = $this->accountAccountRepo->create($accountAccount);

        $createdAccountAccount = $createdAccountAccount->toArray();
        $this->assertArrayHasKey('id', $createdAccountAccount);
        $this->assertNotNull($createdAccountAccount['id'], 'Created AccountAccount must have id specified');
        $this->assertNotNull(AccountAccount::find($createdAccountAccount['id']), 'AccountAccount with given id must be in DB');
        $this->assertModelData($accountAccount, $createdAccountAccount);
    }

    /**
     * @test read
     */
    public function test_read_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();

        $dbAccountAccount = $this->accountAccountRepo->find($accountAccount->id);

        $dbAccountAccount = $dbAccountAccount->toArray();
        $this->assertModelData($accountAccount->toArray(), $dbAccountAccount);
    }

    /**
     * @test update
     */
    public function test_update_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();
        $fakeAccountAccount = AccountAccount::factory()->make()->toArray();

        $updatedAccountAccount = $this->accountAccountRepo->update($fakeAccountAccount, $accountAccount->id);

        $this->assertModelData($fakeAccountAccount, $updatedAccountAccount->toArray());
        $dbAccountAccount = $this->accountAccountRepo->find($accountAccount->id);
        $this->assertModelData($fakeAccountAccount, $dbAccountAccount->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_account()
    {
        $accountAccount = AccountAccount::factory()->create();

        $resp = $this->accountAccountRepo->delete($accountAccount->id);

        $this->assertTrue($resp);
        $this->assertNull(AccountAccount::find($accountAccount->id), 'AccountAccount should not exist in DB');
    }
}
