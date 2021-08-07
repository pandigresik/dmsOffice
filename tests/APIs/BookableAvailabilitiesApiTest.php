<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BookableAvailabilities;

class BookableAvailabilitiesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bookable_availabilities', $bookableAvailabilities
        );

        $this->assertApiResponse($bookableAvailabilities);
    }

    /**
     * @test
     */
    public function test_read_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bookable_availabilities/'.$bookableAvailabilities->id
        );

        $this->assertApiResponse($bookableAvailabilities->toArray());
    }

    /**
     * @test
     */
    public function test_update_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();
        $editedBookableAvailabilities = BookableAvailabilities::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bookable_availabilities/'.$bookableAvailabilities->id,
            $editedBookableAvailabilities
        );

        $this->assertApiResponse($editedBookableAvailabilities);
    }

    /**
     * @test
     */
    public function test_delete_bookable_availabilities()
    {
        $bookableAvailabilities = BookableAvailabilities::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bookable_availabilities/'.$bookableAvailabilities->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bookable_availabilities/'.$bookableAvailabilities->id
        );

        $this->response->assertStatus(404);
    }
}
