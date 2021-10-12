<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsExchangeRates;
use App\Repositories\Accounting\IfrsExchangeRatesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsExchangeRatesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsExchangeRatesRepository
     */
    protected $ifrsExchangeRatesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsExchangeRatesRepo = \App::make(IfrsExchangeRatesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->make()->toArray();

        $createdIfrsExchangeRates = $this->ifrsExchangeRatesRepo->create($ifrsExchangeRates);

        $createdIfrsExchangeRates = $createdIfrsExchangeRates->toArray();
        $this->assertArrayHasKey('id', $createdIfrsExchangeRates);
        $this->assertNotNull($createdIfrsExchangeRates['id'], 'Created IfrsExchangeRates must have id specified');
        $this->assertNotNull(IfrsExchangeRates::find($createdIfrsExchangeRates['id']), 'IfrsExchangeRates with given id must be in DB');
        $this->assertModelData($ifrsExchangeRates, $createdIfrsExchangeRates);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();

        $dbIfrsExchangeRates = $this->ifrsExchangeRatesRepo->find($ifrsExchangeRates->id);

        $dbIfrsExchangeRates = $dbIfrsExchangeRates->toArray();
        $this->assertModelData($ifrsExchangeRates->toArray(), $dbIfrsExchangeRates);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();
        $fakeIfrsExchangeRates = IfrsExchangeRates::factory()->make()->toArray();

        $updatedIfrsExchangeRates = $this->ifrsExchangeRatesRepo->update($fakeIfrsExchangeRates, $ifrsExchangeRates->id);

        $this->assertModelData($fakeIfrsExchangeRates, $updatedIfrsExchangeRates->toArray());
        $dbIfrsExchangeRates = $this->ifrsExchangeRatesRepo->find($ifrsExchangeRates->id);
        $this->assertModelData($fakeIfrsExchangeRates, $dbIfrsExchangeRates->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_exchange_rates()
    {
        $ifrsExchangeRates = IfrsExchangeRates::factory()->create();

        $resp = $this->ifrsExchangeRatesRepo->delete($ifrsExchangeRates->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsExchangeRates::find($ifrsExchangeRates->id), 'IfrsExchangeRates should not exist in DB');
    }
}
