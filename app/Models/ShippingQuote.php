<?php

namespace App\Models;

use App\Entities\ShippingQuote as EntitiesShippingQuote;

class ShippingQuote
{
    const TAXES_QUANTITY = 3;

    private $entityShippingQuote;

    public function __construct(
        EntitiesShippingQuote $entityShippingQuote
    ) {
        $this->entityShippingQuote = $entityShippingQuote;
    }

    /**
     * Salvando uma cotação de frete
     *
     * @param string $uf
     * @param float $quotePercentage
     * @param integer $extraValue
     * @param integer $shippingCompanyId
     * @return void
     */
    public function saveShippingQuote(
        string $uf,
        float $quotePercentage,
        float $extraValue = 0,
        int $shippingCompanyId
    ) {
        return $this->entityShippingQuote->create([
            'transportadora_id' => $shippingCompanyId,
            'uf' => $uf,
            'percentual_cotacao' => $quotePercentage,
            'valor_extra' => $extraValue
        ]);
    }

    /**
     * Busca as N cotações mais baratas para determinado valor de pedido
     *
     * @param string $uf
     * @param float $orderValue
     * @return void
     */
    public function simulateTaxes(
        string $uf,
        float $orderValue
    ) {
        return $this->calculateTopNTaxes(self::TAXES_QUANTITY, $orderValue, $uf);
    }

    /**
     * Lista os registros da tabela cotacao_frete paginados
     *
     * @return void
     */
    public function listShippingQuotes()
    {
        return $this->entityShippingQuote->select(['id', 'uf', 'percentual_cotacao', 'valor_extra', 'transportadora_id'])->paginate(10);
    }

    /**
     * Realiza o filtro das N cotações mais baratas
     *
     * @param integer $quantity
     * @param float $orderValue
     * @param string $uf
     * @return void
     */
    private function calculateTopNTaxes(
        int $quantity,
        float $orderValue,
        string $uf
    ) {
        $shippingQuotes = $this->entityShippingQuote->where('uf', $uf)->get();

        $result = [];
        foreach ($shippingQuotes as $shippingQuote) {
            $result[] = [
                'uf' => $uf,
                'valor_pedido' => $orderValue,
                'transportadora_id' => $shippingQuote->transportadora_id,
                'valor_cotacao' => (($orderValue / 100) * $shippingQuote->percentual_cotacao) + $shippingQuote->valor_extra
            ];
        }

        uasort($result, function ($a, $b) {
            return $a['valor_cotacao'] > $b['valor_cotacao'];
        });

        return array_slice($result, 0, $quantity);
    }
}
