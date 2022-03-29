<?php

namespace Tests\Feature;

use App\Entities\ShippingQuote;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetShippingQuoteFTest extends TestCase
{
    use DatabaseTransactions;

     /**
     * Lista cotacoes
     *
     * @return void
     */
    public function test_listShippingQuotesSuccess()
    {
        $quantity = 5;

        ShippingQuote::factory()->count($quantity)->create();

        $response = $this->get('/api/cotacao');

        $arrayResponse = json_decode($response->getContent(), true);

        $response->assertStatus(200);

        $this->assertArrayHasKey('id', $arrayResponse['data'][0]);
    }
}
