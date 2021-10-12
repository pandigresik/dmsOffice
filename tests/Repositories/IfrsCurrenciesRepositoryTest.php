<?php namespace Tests\Repositories;

use App\Models\Accounting\IfrsCurrencies;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IfrsCurrenciesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IfrsCurrenciesRepository
     */
    protected $ifrsCurrenciesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ifrsCurrenciesRepo = \App::make(IfrsCurrenciesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->make()->toArray();

        $createdIfrsCurrencies = $this->ifrsCurrenciesRepo->create($ifrsCurrencies);

        $createdIfrsCurrencies = $createdIfrsCurrencies->toArray();
        $this->assertArrayHasKey('id', $createdIfrsCurrencies);
        $this->assertNotNull($createdIfrsCurrencies['id'], 'Created IfrsCurrencies must have id specified');
        $this->assertNotNull(IfrsCurrencies::find($createdIfrsCurrencies['id']), 'IfrsCurrencies with given id must be in DB');
        $this->assertModelData($ifrsCurrencies, $createdIfrsCurrencies);
    }

    /**
     * @test read
     */
    public function test_read_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();

        $dbIfrsCurrencies = $this->ifrsCurrenciesRepo->find($ifrsCurrencies->id);

        $dbIfrsCurrencies = $dbIfrsCurrencies->toArray();
        $this->assertModelData($ifrsCurrencies->toArray(), $dbIfrsCurrencies);
    }

    /**
     * @test update
     */
    public function test_update_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();
        $fakeIfrsCurrencies = IfrsCurrencies::factory()->make()->toArray();

        $updatedIfrsCurrencies = $this->ifrsCurrenciesRepo->update($fakeIfrsCurrencies, $ifrsCurrencies->id);

        $this->assertModelData($fakeIfrsCurrencies, $updatedIfrsCurrencies->toArray());
        $dbIfrsCurrencies = $this->ifrsCurrenciesRepo->find($ifrsCurrencies->id);
        $this->assertModelData($fakeIfrsCurrencies, $dbIfrsCurrencies->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ifrs_currencies()
    {
        $ifrsCurrencies = IfrsCurrencies::factory()->create();

        $resp = $this->ifrsCurrenciesRepo->delete($ifrsCurrencies->id);

        $this->assertTrue($resp);
        $this->assertNull(IfrsCurrencies::find($ifrsCurrencies->id), 'IfrsCurrencies should not exist in DB');
    }
}
