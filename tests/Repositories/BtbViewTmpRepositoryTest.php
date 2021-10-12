<?php namespace Tests\Repositories;

use App\Models\Inventory\BtbViewTmp;
use App\Repositories\Inventory\BtbViewTmpRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BtbViewTmpRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BtbViewTmpRepository
     */
    protected $btbViewTmpRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->btbViewTmpRepo = \App::make(BtbViewTmpRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_btb_view_tmp()
    {
        $btbViewTmp = BtbViewTmp::factory()->make()->toArray();

        $createdBtbViewTmp = $this->btbViewTmpRepo->create($btbViewTmp);

        $createdBtbViewTmp = $createdBtbViewTmp->toArray();
        $this->assertArrayHasKey('id', $createdBtbViewTmp);
        $this->assertNotNull($createdBtbViewTmp['id'], 'Created BtbViewTmp must have id specified');
        $this->assertNotNull(BtbViewTmp::find($createdBtbViewTmp['id']), 'BtbViewTmp with given id must be in DB');
        $this->assertModelData($btbViewTmp, $createdBtbViewTmp);
    }

    /**
     * @test read
     */
    public function test_read_btb_view_tmp()
    {
        $btbViewTmp = BtbViewTmp::factory()->create();

        $dbBtbViewTmp = $this->btbViewTmpRepo->find($btbViewTmp->id);

        $dbBtbViewTmp = $dbBtbViewTmp->toArray();
        $this->assertModelData($btbViewTmp->toArray(), $dbBtbViewTmp);
    }

    /**
     * @test update
     */
    public function test_update_btb_view_tmp()
    {
        $btbViewTmp = BtbViewTmp::factory()->create();
        $fakeBtbViewTmp = BtbViewTmp::factory()->make()->toArray();

        $updatedBtbViewTmp = $this->btbViewTmpRepo->update($fakeBtbViewTmp, $btbViewTmp->id);

        $this->assertModelData($fakeBtbViewTmp, $updatedBtbViewTmp->toArray());
        $dbBtbViewTmp = $this->btbViewTmpRepo->find($btbViewTmp->id);
        $this->assertModelData($fakeBtbViewTmp, $dbBtbViewTmp->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_btb_view_tmp()
    {
        $btbViewTmp = BtbViewTmp::factory()->create();

        $resp = $this->btbViewTmpRepo->delete($btbViewTmp->id);

        $this->assertTrue($resp);
        $this->assertNull(BtbViewTmp::find($btbViewTmp->id), 'BtbViewTmp should not exist in DB');
    }
}
