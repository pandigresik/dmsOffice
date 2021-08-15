<?php namespace Tests\Repositories;

use App\Models\Base\RouteTrip;
use App\Repositories\Base\RouteTripRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RouteTripRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RouteTripRepository
     */
    protected $routeTripRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->routeTripRepo = \App::make(RouteTripRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_route_trip()
    {
        $routeTrip = RouteTrip::factory()->make()->toArray();

        $createdRouteTrip = $this->routeTripRepo->create($routeTrip);

        $createdRouteTrip = $createdRouteTrip->toArray();
        $this->assertArrayHasKey('id', $createdRouteTrip);
        $this->assertNotNull($createdRouteTrip['id'], 'Created RouteTrip must have id specified');
        $this->assertNotNull(RouteTrip::find($createdRouteTrip['id']), 'RouteTrip with given id must be in DB');
        $this->assertModelData($routeTrip, $createdRouteTrip);
    }

    /**
     * @test read
     */
    public function test_read_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();

        $dbRouteTrip = $this->routeTripRepo->find($routeTrip->id);

        $dbRouteTrip = $dbRouteTrip->toArray();
        $this->assertModelData($routeTrip->toArray(), $dbRouteTrip);
    }

    /**
     * @test update
     */
    public function test_update_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();
        $fakeRouteTrip = RouteTrip::factory()->make()->toArray();

        $updatedRouteTrip = $this->routeTripRepo->update($fakeRouteTrip, $routeTrip->id);

        $this->assertModelData($fakeRouteTrip, $updatedRouteTrip->toArray());
        $dbRouteTrip = $this->routeTripRepo->find($routeTrip->id);
        $this->assertModelData($fakeRouteTrip, $dbRouteTrip->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_route_trip()
    {
        $routeTrip = RouteTrip::factory()->create();

        $resp = $this->routeTripRepo->delete($routeTrip->id);

        $this->assertTrue($resp);
        $this->assertNull(RouteTrip::find($routeTrip->id), 'RouteTrip should not exist in DB');
    }
}
