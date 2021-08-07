<?php namespace Tests\Repositories;

use App\Models\BookableAvailabilities;
use App\Repositories\BookableAvailabilitiesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BookableAvailabilitiesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BookableAvailabilitiesRepository
     */
    protected $bookableAvailabilitiesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bookableAvailabilitiesRepo = \App::make(BookableAvailabilitiesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->make()->toArray();

        $createdBookableAvailabilities = $this->bookableAvailabilitiesRepo->create($bookableAvailabilities);

        $createdBookableAvailabilities = $createdBookableAvailabilities->toArray();
        $this->assertArrayHasKey('id', $createdBookableAvailabilities);
        $this->assertNotNull($createdBookableAvailabilities['id'], 'Created BookableAvailabilities must have id specified');
        $this->assertNotNull(BookableAvailabilities::find($createdBookableAvailabilities['id']), 'BookableAvailabilities with given id must be in DB');
        $this->assertModelData($bookableAvailabilities, $createdBookableAvailabilities);
    }

    /**
     * @test read
     */
    public function test_read_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();

        $dbBookableAvailabilities = $this->bookableAvailabilitiesRepo->find($bookableAvailabilities->id);

        $dbBookableAvailabilities = $dbBookableAvailabilities->toArray();
        $this->assertModelData($bookableAvailabilities->toArray(), $dbBookableAvailabilities);
    }

    /**
     * @test update
     */
    public function test_update_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();
        $fakeBookableAvailabilities = BookableAvailabilities::factory()->make()->toArray();

        $updatedBookableAvailabilities = $this->bookableAvailabilitiesRepo->update($fakeBookableAvailabilities, $bookableAvailabilities->id);

        $this->assertModelData($fakeBookableAvailabilities, $updatedBookableAvailabilities->toArray());
        $dbBookableAvailabilities = $this->bookableAvailabilitiesRepo->find($bookableAvailabilities->id);
        $this->assertModelData($fakeBookableAvailabilities, $dbBookableAvailabilities->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();

        $resp = $this->bookableAvailabilitiesRepo->delete($bookableAvailabilities->id);

        $this->assertTrue($resp);
        $this->assertNull(BookableAvailabilities::find($bookableAvailabilities->id), 'BookableAvailabilities should not exist in DB');
    }
}
