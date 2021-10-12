<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsReportingPeriods;
use App\Repositories\Accounting\IfrsReportingPeriodsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsReportingPeriodsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsReportingPeriodsRepository
     */
    protected $ifrsReportingPeriodsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsReportingPeriodsRepo = \App::make(IfrsReportingPeriodsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->make()->toArray();

        $createdIfrsReportingPeriods = $this->ifrsReportingPeriodsRepo->create($ifrsReportingPeriods);

        $createdIfrsReportingPeriods = $createdIfrsReportingPeriods->toArray();
        $this->assertArrayHasKey('id', $createdIfrsReportingPeriods);
        $this->assertNotNull($createdIfrsReportingPeriods['id'], 'Created IfrsReportingPeriods must have id specified');
        $this->assertNotNull(IfrsReportingPeriods::find($createdIfrsReportingPeriods['id']), 'IfrsReportingPeriods with given id must be in DB');
        $this->assertModelData($ifrsReportingPeriods, $createdIfrsReportingPeriods);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();

        $dbIfrsReportingPeriods = $this->ifrsReportingPeriodsRepo->find($ifrsReportingPeriods->id);

        $dbIfrsReportingPeriods = $dbIfrsReportingPeriods->toArray();
        $this->assertModelData($ifrsReportingPeriods->toArray(), $dbIfrsReportingPeriods);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();
        $fakeIfrsReportingPeriods = IfrsReportingPeriods::factory()->make()->toArray();

        $updatedIfrsReportingPeriods = $this->ifrsReportingPeriodsRepo->update($fakeIfrsReportingPeriods, $ifrsReportingPeriods->id);

        $this->assertModelData($fakeIfrsReportingPeriods, $updatedIfrsReportingPeriods->toArray());
        $dbIfrsReportingPeriods = $this->ifrsReportingPeriodsRepo->find($ifrsReportingPeriods->id);
        $this->assertModelData($fakeIfrsReportingPeriods, $dbIfrsReportingPeriods->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();

        $resp = $this->ifrsReportingPeriodsRepo->delete($ifrsReportingPeriods->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsReportingPeriods::find($ifrsReportingPeriods->id), 'IfrsReportingPeriods should not exist in DB');
    }
}
