<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\Uom;

class UomApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_uom()
    {
        $uom = Uom::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/uoms', $uom
        );

        $this->assertApiResponse($uom);
    }

    /**
     * @test
     */
    public function test_read_uom()
    {
        $uom = Uom::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/uoms/'.$uom->id
        );

        $this->assertApiResponse($uom->toArray());
    }

    /**
     * @test
     */
    public function test_update_uom()
    {
        $uom = Uom::factory()->create();
        $editedUom = Uom::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/uoms/'.$uom->id,
            $editedUom
        );

        $this->assertApiResponse($editedUom);
    }

    /**
     * @test
     */
    public function test_delete_uom()
    {
        $uom = Uom::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/uoms/'.$uom->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/uoms/'.$uom->id
        );

        $this->response->assertStatus(404);
    }
}
