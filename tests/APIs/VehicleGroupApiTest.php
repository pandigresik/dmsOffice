<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\VehicleGroup;

class VehicleGroupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/vehicle_groups', $vehicleGroup
        );

        $this->assertApiResponse($vehicleGroup);
    }

    /**
     * @test
     */
    public function test_read_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/vehicle_groups/'.$vehicleGroup->id
        );

        $this->assertApiResponse($vehicleGroup->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();
        $editedVehicleGroup = VehicleGroup::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/vehicle_groups/'.$vehicleGroup->id,
            $editedVehicleGroup
        );

        $this->assertApiResponse($editedVehicleGroup);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/vehicle_groups/'.$vehicleGroup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/vehicle_groups/'.$vehicleGroup->id
        );

        $this->response->assertStatus(404);
    }
}
