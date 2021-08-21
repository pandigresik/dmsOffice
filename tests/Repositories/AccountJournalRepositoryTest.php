<?php namespace Tests\Repositories;

use App\Models\Accounting\AccountJournal;
use App\Repositories\Accounting\AccountJournalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccountJournalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccountJournalRepository
     */
    protected $accountJournalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountJournalRepo = \App::make(AccountJournalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_journal()
    {
        $accountJournal = AccountJournal::factory()->make()->toArray();

        $createdAccountJournal = $this->accountJournalRepo->create($accountJournal);

        $createdAccountJournal = $createdAccountJournal->toArray();
        $this->assertArrayHasKey('id', $createdAccountJournal);
        $this->assertNotNull($createdAccountJournal['id'], 'Created AccountJournal must have id specified');
        $this->assertNotNull(AccountJournal::find($createdAccountJournal['id']), 'AccountJournal with given id must be in DB');
        $this->assertModelData($accountJournal, $createdAccountJournal);
    }

    /**
     * @test read
     */
    public function test_read_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();

        $dbAccountJournal = $this->accountJournalRepo->find($accountJournal->id);

        $dbAccountJournal = $dbAccountJournal->toArray();
        $this->assertModelData($accountJournal->toArray(), $dbAccountJournal);
    }

    /**
     * @test update
     */
    public function test_update_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();
        $fakeAccountJournal = AccountJournal::factory()->make()->toArray();

        $updatedAccountJournal = $this->accountJournalRepo->update($fakeAccountJournal, $accountJournal->id);

        $this->assertModelData($fakeAccountJournal, $updatedAccountJournal->toArray());
        $dbAccountJournal = $this->accountJournalRepo->find($accountJournal->id);
        $this->assertModelData($fakeAccountJournal, $dbAccountJournal->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_journal()
    {
        $accountJournal = AccountJournal::factory()->create();

        $resp = $this->accountJournalRepo->delete($accountJournal->id);

        $this->assertTrue($resp);
        $this->assertNull(AccountJournal::find($accountJournal->id), 'AccountJournal should not exist in DB');
    }
}
