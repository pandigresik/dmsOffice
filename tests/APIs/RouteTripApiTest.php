<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\RouteTrip;

class RouteTripApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_route_trip()
    {
        $routeTrip = RouteTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/route_trips', $routeTrip
        );

        $this->assertApiResponse($routeTrip);
    }

    /**
     * @test
     */
    public function test_read_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/route_trips/'.$routeTrip->id
        );

        $this->assertApiResponse($routeTrip->toArray());
    }

    /**
     * @test
     */
    public function test_update_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();
        $editedRouteTrip = RouteTrip::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/route_trips/'.$routeTrip->id,
            $editedRouteTrip
        );

        $this->assertApiResponse($editedRouteTrip);
    }

    /**
     * @test
     */
    public function test_delete_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/route_trips/'.$routeTrip->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/route_trips/'.$routeTrip->id
        );

        $this->response->assertStatus(404);
    }
}
