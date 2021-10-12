<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsExchangeRates;

class IfrsExchangeRatesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_exchange_rates', $ifrsExchangeRates
        );

        $this->assertApiResponse($ifrsExchangeRates);
    }

    /**
     * @test
     */
    public function test_read_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_exchange_rates/'.$ifrsExchangeRates->id
        );

        $this->assertApiResponse($ifrsExchangeRates->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();
        $editedIfrsExchangeRates = IfrsExchangeRates::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_exchange_rates/'.$ifrsExchangeRates->id,
            $editedIfrsExchangeRates
        );

        $this->assertApiResponse($editedIfrsExchangeRates);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_exchange_rates/'.$ifrsExchangeRates->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_exchange_rates/'.$ifrsExchangeRates->id
        );

        $this->response->assertStatus(404);
    }
}
