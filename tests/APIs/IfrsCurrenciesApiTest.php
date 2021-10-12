<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accounting\IfrsCurrencies;

class IfrsCurrenciesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accounting/ifrs_currencies', $ifrsCurrencies
        );

        $this->assertApiResponse($ifrsCurrencies);
    }

    /**
     * @test
     */
    public function test_read_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_currencies/'.$ifrsCurrencies->id
        );

        $this->assertApiResponse($ifrsCurrencies->toArray());
    }

    /**
     * @test
     */
    public function test_update_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();
        $editedIfrsCurrencies = IfrsCurrencies::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accounting/ifrs_currencies/'.$ifrsCurrencies->id,
            $editedIfrsCurrencies
        );

        $this->assertApiResponse($editedIfrsCurrencies);
    }

    /**
     * @test
     */
    public function test_delete_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accounting/ifrs_currencies/'.$ifrsCurrencies->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accounting/ifrs_currencies/'.$ifrsCurrencies->id
        );

        $this->response->assertStatus(404);
    }
}
