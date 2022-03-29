<?php

namespace App\Actions\ShippingQuote;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimulateTaxesRequest;
use App\Models\ShippingQuote;

class SimulateTaxes extends Controller
{
    private $modelShippingQuote;

    public function __construct(
        ShippingQuote $modelShippingQuote
    ) {
        $this->modelShippingQuote = $modelShippingQuote;
    }

    /**
     * @OA\Put(
     * path="/api/cotacao",
     * summary="Simula imposto",
     * description="Simula imposto",
     * tags={"Cotação"},
     * @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *       required={"uf","valor_pedido"},
     *       @OA\Property(property="uf", type="string", format="string", example="PR"),
     *       @OA\Property(property="valor_pedido", type="float", format="number", example="565.70")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Sucesso",
     *    @OA\JsonContent(
     *      type="array",
     *      @OA\Items(
     *           @OA\Property(property="uf", type="string", example="PR"),
     *           @OA\Property(property="valor_pedido", type="float", example="10.12"),
     *           @OA\Property(property="transportadora_id", type="integer", example="1"),
     *           @OA\Property(property="valor_cotacao", type="number", example="26.31")
     *      )
     *     ))
     * )
     */
    public function __invoke(SimulateTaxesRequest $request)
    {
        $result = $this->modelShippingQuote->simulateTaxes(
            $request->uf,
            $request->valor_pedido
        );

        return response()->json($result, 200);
    }
}
