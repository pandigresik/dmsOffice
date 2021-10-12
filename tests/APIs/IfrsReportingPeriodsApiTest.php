<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsReportingPeriods;

class IfrsReportingPeriodsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_reporting_periods', $ifrsReportingPeriods
        );

        $this->assertApiResponse($ifrsReportingPeriods);
    }

    /**
     * @test
     */
    public function test_read_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_reporting_periods/'.$ifrsReportingPeriods->id
        );

        $this->assertApiResponse($ifrsReportingPeriods->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();
        $editedIfrsReportingPeriods = IfrsReportingPeriods::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_reporting_periods/'.$ifrsReportingPeriods->id,
            $editedIfrsReportingPeriods
        );

        $this->assertApiResponse($editedIfrsReportingPeriods);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_reporting_periods()
    {
        $ifrsReportingPeriods = IfrsReportingPeriods::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_reporting_periods/'.$ifrsReportingPeriods->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_reporting_periods/'.$ifrsReportingPeriods->id
        );

        $this->response->assertStatus(404);
    }
}
