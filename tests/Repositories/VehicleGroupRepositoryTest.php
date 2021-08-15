<?php namespace Tests\Repositories;

use App\Models\Base\VehicleGroup;
use App\Repositories\Base\VehicleGroupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehicleGroupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleGroupRepository
     */
    protected $vehicleGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehicleGroupRepo = \App::make(VehicleGroupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->make()->toArray();

        $createdVehicleGroup = $this->vehicleGroupRepo->create($vehicleGroup);

        $createdVehicleGroup = $createdVehicleGroup->toArray();
        $this->assertArrayHasKey('id', $createdVehicleGroup);
        $this->assertNotNull($createdVehicleGroup['id'], 'Created VehicleGroup must have id specified');
        $this->assertNotNull(VehicleGroup::find($createdVehicleGroup['id']), 'VehicleGroup with given id must be in DB');
        $this->assertModelData($vehicleGroup, $createdVehicleGroup);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();

        $dbVehicleGroup = $this->vehicleGroupRepo->find($vehicleGroup->id);

        $dbVehicleGroup = $dbVehicleGroup->toArray();
        $this->assertModelData($vehicleGroup->toArray(), $dbVehicleGroup);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();
        $fakeVehicleGroup = VehicleGroup::factory()->make()->toArray();

        $updatedVehicleGroup = $this->vehicleGroupRepo->update($fakeVehicleGroup, $vehicleGroup->id);

        $this->assertModelData($fakeVehicleGroup, $updatedVehicleGroup->toArray());
        $dbVehicleGroup = $this->vehicleGroupRepo->find($vehicleGroup->id);
        $this->assertModelData($fakeVehicleGroup, $dbVehicleGroup->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_group()
    {
        $vehicleGroup = VehicleGroup::factory()->create();

        $resp = $this->vehicleGroupRepo->delete($vehicleGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(VehicleGroup::find($vehicleGroup->id), 'VehicleGroup should not exist in DB');
    }
}
