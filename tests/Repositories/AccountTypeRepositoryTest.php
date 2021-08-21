<?php namespace Tests\Repositories;

use App\Models\Accounting\AccountType;
use App\Repositories\Accounting\AccountTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccountTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccountTypeRepository
     */
    protected $accountTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountTypeRepo = \App::make(AccountTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_type()
    {
        $accountType = AccountType::factory()->make()->toArray();

        $createdAccountType = $this->accountTypeRepo->create($accountType);

        $createdAccountType = $createdAccountType->toArray();
        $this->assertArrayHasKey('id', $createdAccountType);
        $this->assertNotNull($createdAccountType['id'], 'Created AccountType must have id specified');
        $this->assertNotNull(AccountType::find($createdAccountType['id']), 'AccountType with given id must be in DB');
        $this->assertModelData($accountType, $createdAccountType);
    }

    /**
     * @test read
     */
    public function test_read_account_type()
    {
        $accountType = AccountType::factory()->create();

        $dbAccountType = $this->accountTypeRepo->find($accountType->id);

        $dbAccountType = $dbAccountType->toArray();
        $this->assertModelData($accountType->toArray(), $dbAccountType);
    }

    /**
     * @test update
     */
    public function test_update_account_type()
    {
        $accountType = AccountType::factory()->create();
        $fakeAccountType = AccountType::factory()->make()->toArray();

        $updatedAccountType = $this->accountTypeRepo->update($fakeAccountType, $accountType->id);

        $this->assertModelData($fakeAccountType, $updatedAccountType->toArray());
        $dbAccountType = $this->accountTypeRepo->find($accountType->id);
        $this->assertModelData($fakeAccountType, $dbAccountType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_type()
    {
        $accountType = AccountType::factory()->create();

        $resp = $this->accountTypeRepo->delete($accountType->id);

        $this->assertTrue($resp);
        $this->assertNull(AccountType::find($accountType->id), 'AccountType should not exist in DB');
    }
}
