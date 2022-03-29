<?php

namespace Tests\Feature;

use App\Entities\ShippingQuote;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SaveShippingQuoteFTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Salva uma cotacao no banco de dados com sucesso
     */
    public function test_saveShippingQuoteSuccess()
    {
        $shippingQuote = ShippingQuote::factory()->make()->toArray();

        $response = $this->post('/api/cotacao', $shippingQuote);

        $response->assertStatus(200);

        $this->assertDatabaseHas('cotacao_frete', [
            'transportadora_id' => $shippingQuote['transportadora_id'],
            'uf' => $shippingQuote['uf'],
        ]);
    }

    /**
     * Tenta salvar sem uf
     */
    public function test_saveShippingQuoteWithoutUf()
    {
        $shippingQuote = ShippingQuote::factory()->make()->toArray();
        $aux = $shippingQuote['uf'];
        unset($shippingQuote['uf']);

        $response = $this->post('/api/cotacao', $shippingQuote);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('cotacao_frete', [
            'transportadora_id' => $shippingQuote['transportadora_id'],
            'uf' => $aux,
        ]);
    }

    /**
     * Tenta salvar sem valor extra
     */
    public function test_saveShippingQuoteWithoutExtraValue()
    {
        $shippingQuote = ShippingQuote::factory()->make()->toArray();
        $aux = $shippingQuote['valor_extra'];
        unset($shippingQuote['valor_extra']);

        $response = $this->post('/api/cotacao', $shippingQuote);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('cotacao_frete', [
            'transportadora_id' => $shippingQuote['transportadora_id'],
            'valor_extra' => $aux,
        ]);
    }

    /**
     * Tenta salvar sem percentual
     */
    public function test_saveShippingQuoteWithoutQuotePercentage()
    {
        $shippingQuote = ShippingQuote::factory()->make()->toArray();
        $aux = $shippingQuote['percentual_cotacao'];
        unset($shippingQuote['percentual_cotacao']);

        $response = $this->post('/api/cotacao', $shippingQuote);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('cotacao_frete', [
            'transportadora_id' => $shippingQuote['transportadora_id'],
            'percentual_cotacao' => $aux,
        ]);
    }

    /**
     * Tenta salvar sem transportadora
     */
    public function test_saveShippingQuoteWithoutShippingCompany()
    {
        $shippingQuote = ShippingQuote::factory()->make()->toArray();
        $aux = $shippingQuote['transportadora_id'];
        unset($shippingQuote['transportadora_id']);

        $response = $this->post('/api/cotacao', $shippingQuote);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('cotacao_frete', [
            'transportadora_id' => $aux,
        ]);
    }
}
