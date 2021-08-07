<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BookableBookings;

class BookableBookingsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bookable_bookings', $bookableBookings
        );

        $this->assertApiResponse($bookableBookings);
    }

    /**
     * @test
     */
    public function test_read_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bookable_bookings/'.$bookableBookings->id
        );

        $this->assertApiResponse($bookableBookings->toArray());
    }

    /**
     * @test
     */
    public function test_update_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();
        $editedBookableBookings = BookableBookings::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bookable_bookings/'.$bookableBookings->id,
            $editedBookableBookings
        );

        $this->assertApiResponse($editedBookableBookings);
    }

    /**
     * @test
     */
    public function test_delete_bookable_bookings()
    {
        $bookableBookings = BookableBookings::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bookable_bookings/'.$bookableBookings->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bookable_bookings/'.$bookableBookings->id
        );

        $this->response->assertStatus(404);
    }
}
