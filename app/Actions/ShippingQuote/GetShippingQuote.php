<?php

namespace App\Actions\ShippingQuote;

use App\Http\Controllers\Controller;
use App\Models\ShippingQuote;

class GetShippingQuote extends Controller
{
    private $modelShippingQuote;

    public function __construct(
        ShippingQuote $modelShippingQuote
    ) {
        $this->modelShippingQuote = $modelShippingQuote;
    }

    /**
     * @OA\Get(
     * path="/api/cotacao",
     * summary="Lista os impostos",
     * description="Lista os impostos",
     * tags={"Cotação"},
     * @OA\Response(
     *    response=200,
     *    description="Sucesso",
     *    @OA\JsonContent(
     *      type="object",
     *      @OA\Property(
     *          property="data",
     *          type="array",
     *          @OA\Items(
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="uf", type="string", example="PR"),
     *              @OA\Property(property="percentual_cotacao", type="float", example="10.12"),
     *              @OA\Property(property="valor_extra", type="number", example="26.31"),
     *              @OA\Property(property="transportadora_id", type="integer", example="1")
     *          ))
     *   ))
     * )
     */
    public function __invoke()
    {
        $result = $this->modelShippingQuote->listShippingQuotes();

        return response()->json($result, 200);
    }
}
