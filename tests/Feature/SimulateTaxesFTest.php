<?php

namespace Tests\Feature;

use App\Entities\ShippingQuote;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SimulateTaxesFTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Faz o calculo de cotacao e lista as N mais baratas
     */
    public function test_calculateTaxesSuccess()
    {
        $shippingQuote = ShippingQuote::factory()->count(10)->create()->toArray();

        $data = [
            'uf' => $shippingQuote[0]['uf'],
            'valor_pedido' => 123.45
        ];

        $response = $this->put('/api/cotacao', $data);

        $response->assertStatus(200);
    }
}
