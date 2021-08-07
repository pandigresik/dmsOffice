<?php namespace Tests\Repositories;

use App\Models\BookableBookings;
use App\Repositories\BookableBookingsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BookableBookingsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BookableBookingsRepository
     */
    protected $bookableBookingsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bookableBookingsRepo = \App::make(BookableBookingsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->make()->toArray();

        $createdBookableBookings = $this->bookableBookingsRepo->create($bookableBookings);

        $createdBookableBookings = $createdBookableBookings->toArray();
        $this->assertArrayHasKey('id', $createdBookableBookings);
        $this->assertNotNull($createdBookableBookings['id'], 'Created BookableBookings must have id specified');
        $this->assertNotNull(BookableBookings::find($createdBookableBookings['id']), 'BookableBookings with given id must be in DB');
        $this->assertModelData($bookableBookings, $createdBookableBookings);
    }

    /**
     * @test read
     */
    public function test_read_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();

        $dbBookableBookings = $this->bookableBookingsRepo->find($bookableBookings->id);

        $dbBookableBookings = $dbBookableBookings->toArray();
        $this->assertModelData($bookableBookings->toArray(), $dbBookableBookings);
    }

    /**
     * @test update
     */
    public function test_update_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();
        $fakeBookableBookings = BookableBookings::factory()->make()->toArray();

        $updatedBookableBookings = $this->bookableBookingsRepo->update($fakeBookableBookings, $bookableBookings->id);

        $this->assertModelData($fakeBookableBookings, $updatedBookableBookings->toArray());
        $dbBookableBookings = $this->bookableBookingsRepo->find($bookableBookings->id);
        $this->assertModelData($fakeBookableBookings, $dbBookableBookings->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();

        $resp = $this->bookableBookingsRepo->delete($bookableBookings->id);

        $this->assertTrue($resp);
        $this->assertNull(BookableBookings::find($bookableBookings->id), 'BookableBookings should not exist in DB');
    }
}
