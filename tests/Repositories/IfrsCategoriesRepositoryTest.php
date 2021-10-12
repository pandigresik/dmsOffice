<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsCategories;
use App\Repositories\Accounting\IfrsCategoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsCategoriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsCategoriesRepository
     */
    protected $ifrsCategoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsCategoriesRepo = \App::make(IfrsCategoriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->make()->toArray();

        $createdIfrsCategories = $this->ifrsCategoriesRepo->create($ifrsCategories);

        $createdIfrsCategories = $createdIfrsCategories->toArray();
        $this->assertArrayHasKey('id', $createdIfrsCategories);
        $this->assertNotNull($createdIfrsCategories['id'], 'Created IfrsCategories must have id specified');
        $this->assertNotNull(IfrsCategories::find($createdIfrsCategories['id']), 'IfrsCategories with given id must be in DB');
        $this->assertModelData($ifrsCategories, $createdIfrsCategories);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();

        $dbIfrsCategories = $this->ifrsCategoriesRepo->find($ifrsCategories->id);

        $dbIfrsCategories = $dbIfrsCategories->toArray();
        $this->assertModelData($ifrsCategories->toArray(), $dbIfrsCategories);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();
        $fakeIfrsCategories = IfrsCategories::factory()->make()->toArray();

        $updatedIfrsCategories = $this->ifrsCategoriesRepo->update($fakeIfrsCategories, $ifrsCategories->id);

        $this->assertModelData($fakeIfrsCategories, $updatedIfrsCategories->toArray());
        $dbIfrsCategories = $this->ifrsCategoriesRepo->find($ifrsCategories->id);
        $this->assertModelData($fakeIfrsCategories, $dbIfrsCategories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_categories()
    {
        $ifrsCategories = IfrsCategories::factory()->create();

        $resp = $this->ifrsCategoriesRepo->delete($ifrsCategories->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsCategories::find($ifrsCategories->id), 'IfrsCategories should not exist in DB');
    }
}
