<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsAccounts;
use App\Repositories\Accounting\IfrsAccountsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsAccountsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsAccountsRepository
     */
    protected $ifrsAccountsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsAccountsRepo = \App::make(IfrsAccountsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->make()->toArray();

        $createdIfrsAccounts = $this->ifrsAccountsRepo->create($ifrsAccounts);

        $createdIfrsAccounts = $createdIfrsAccounts->toArray();
        $this->assertArrayHasKey('id', $createdIfrsAccounts);
        $this->assertNotNull($createdIfrsAccounts['id'], 'Created IfrsAccounts must have id specified');
        $this->assertNotNull(IfrsAccounts::find($createdIfrsAccounts['id']), 'IfrsAccounts with given id must be in DB');
        $this->assertModelData($ifrsAccounts, $createdIfrsAccounts);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();

        $dbIfrsAccounts = $this->ifrsAccountsRepo->find($ifrsAccounts->id);

        $dbIfrsAccounts = $dbIfrsAccounts->toArray();
        $this->assertModelData($ifrsAccounts->toArray(), $dbIfrsAccounts);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();
        $fakeIfrsAccounts = IfrsAccounts::factory()->make()->toArray();

        $updatedIfrsAccounts = $this->ifrsAccountsRepo->update($fakeIfrsAccounts, $ifrsAccounts->id);

        $this->assertModelData($fakeIfrsAccounts, $updatedIfrsAccounts->toArray());
        $dbIfrsAccounts = $this->ifrsAccountsRepo->find($ifrsAccounts->id);
        $this->assertModelData($fakeIfrsAccounts, $dbIfrsAccounts->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_accounts()
    {
        $ifrsAccounts = IfrsAccounts::factory()->create();

        $resp = $this->ifrsAccountsRepo->delete($ifrsAccounts->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsAccounts::find($ifrsAccounts->id), 'IfrsAccounts should not exist in DB');
    }
}
