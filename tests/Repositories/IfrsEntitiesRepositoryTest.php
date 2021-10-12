<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsEntities;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsEntitiesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsEntitiesRepository
     */
    protected $ifrsEntitiesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsEntitiesRepo = \App::make(IfrsEntitiesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->make()->toArray();

        $createdIfrsEntities = $this->ifrsEntitiesRepo->create($ifrsEntities);

        $createdIfrsEntities = $createdIfrsEntities->toArray();
        $this->assertArrayHasKey('id', $createdIfrsEntities);
        $this->assertNotNull($createdIfrsEntities['id'], 'Created IfrsEntities must have id specified');
        $this->assertNotNull(IfrsEntities::find($createdIfrsEntities['id']), 'IfrsEntities with given id must be in DB');
        $this->assertModelData($ifrsEntities, $createdIfrsEntities);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();

        $dbIfrsEntities = $this->ifrsEntitiesRepo->find($ifrsEntities->id);

        $dbIfrsEntities = $dbIfrsEntities->toArray();
        $this->assertModelData($ifrsEntities->toArray(), $dbIfrsEntities);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();
        $fakeIfrsEntities = IfrsEntities::factory()->make()->toArray();

        $updatedIfrsEntities = $this->ifrsEntitiesRepo->update($fakeIfrsEntities, $ifrsEntities->id);

        $this->assertModelData($fakeIfrsEntities, $updatedIfrsEntities->toArray());
        $dbIfrsEntities = $this->ifrsEntitiesRepo->find($ifrsEntities->id);
        $this->assertModelData($fakeIfrsEntities, $dbIfrsEntities->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_entities()
    {
        $ifrsEntities = IfrsEntities::factory()->create();

        $resp = $this->ifrsEntitiesRepo->delete($ifrsEntities->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsEntities::find($ifrsEntities->id), 'IfrsEntities should not exist in DB');
    }
}
