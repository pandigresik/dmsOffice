<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsVats;
use App\Repositories\Accounting\IfrsVatsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsVatsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsVatsRepository
     */
    protected $ifrsVatsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsVatsRepo = \App::make(IfrsVatsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->make()->toArray();

        $createdIfrsVats = $this->ifrsVatsRepo->create($ifrsVats);

        $createdIfrsVats = $createdIfrsVats->toArray();
        $this->assertArrayHasKey('id', $createdIfrsVats);
        $this->assertNotNull($createdIfrsVats['id'], 'Created IfrsVats must have id specified');
        $this->assertNotNull(IfrsVats::find($createdIfrsVats['id']), 'IfrsVats with given id must be in DB');
        $this->assertModelData($ifrsVats, $createdIfrsVats);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();

        $dbIfrsVats = $this->ifrsVatsRepo->find($ifrsVats->id);

        $dbIfrsVats = $dbIfrsVats->toArray();
        $this->assertModelData($ifrsVats->toArray(), $dbIfrsVats);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();
        $fakeIfrsVats = IfrsVats::factory()->make()->toArray();

        $updatedIfrsVats = $this->ifrsVatsRepo->update($fakeIfrsVats, $ifrsVats->id);

        $this->assertModelData($fakeIfrsVats, $updatedIfrsVats->toArray());
        $dbIfrsVats = $this->ifrsVatsRepo->find($ifrsVats->id);
        $this->assertModelData($fakeIfrsVats, $dbIfrsVats->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_vats()
    {
        $ifrsVats = IfrsVats::factory()->create();

        $resp = $this->ifrsVatsRepo->delete($ifrsVats->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsVats::find($ifrsVats->id), 'IfrsVats should not exist in DB');
    }
}
