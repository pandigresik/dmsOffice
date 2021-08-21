<?php namespace Tests\Repositories;

use App\Models\Accounting\AccountMove;
use App\Repositories\Accounting\AccountMoveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccountMoveRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccountMoveRepository
     */
    protected $accountMoveRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accountMoveRepo = \App::make(AccountMoveRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_account_move()
    {
        $accountMove = AccountMove::factory()->make()->toArray();

        $createdAccountMove = $this->accountMoveRepo->create($accountMove);

        $createdAccountMove = $createdAccountMove->toArray();
        $this->assertArrayHasKey('id', $createdAccountMove);
        $this->assertNotNull($createdAccountMove['id'], 'Created AccountMove must have id specified');
        $this->assertNotNull(AccountMove::find($createdAccountMove['id']), 'AccountMove with given id must be in DB');
        $this->assertModelData($accountMove, $createdAccountMove);
    }

    /**
     * @test read
     */
    public function test_read_account_move()
    {
        $accountMove = AccountMove::factory()->create();

        $dbAccountMove = $this->accountMoveRepo->find($accountMove->id);

        $dbAccountMove = $dbAccountMove->toArray();
        $this->assertModelData($accountMove->toArray(), $dbAccountMove);
    }

    /**
     * @test update
     */
    public function test_update_account_move()
    {
        $accountMove = AccountMove::factory()->create();
        $fakeAccountMove = AccountMove::factory()->make()->toArray();

        $updatedAccountMove = $this->accountMoveRepo->update($fakeAccountMove, $accountMove->id);

        $this->assertModelData($fakeAccountMove, $updatedAccountMove->toArray());
        $dbAccountMove = $this->accountMoveRepo->find($accountMove->id);
        $this->assertModelData($fakeAccountMove, $dbAccountMove->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_account_move()
    {
        $accountMove = AccountMove::factory()->create();

        $resp = $this->accountMoveRepo->delete($accountMove->id);

        $this->assertTrue($resp);
        $this->assertNull(AccountMove::find($accountMove->id), 'AccountMove should not exist in DB');
    }
}
