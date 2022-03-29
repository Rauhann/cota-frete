<?php

namespace App\Actions\ShippingQuote;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingQuoteRequest;
use App\Models\ShippingQuote;

class SaveShippingQuote extends Controller
{
    private $modelShippingQuote;

    public function __construct(
        ShippingQuote $modelShippingQuote
    ) {
        $this->modelShippingQuote = $modelShippingQuote;
    }

    /**
     * @OA\Post(
     * path="/api/cotacao",
     * summary="Cria uma cotação de frete",
     * description="Cria uma cotação de frete",
     * tags={"Cotação"},
     * @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *       required={"uf","percentual_cotacao","valor_extra","transportadora_id"},
     *       @OA\Property(property="uf", type="string", format="string", example="PR"),
     *       @OA\Property(property="percentual_cotacao", type="float", format="number", example="2.95"),
     *       @OA\Property(property="valor_extra", type="float", format="number", example="14.35"),
     *       @OA\Property(property="transportadora_id", type="integer", format="number", example="2")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Sucesso",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sucesso"))
     *     )
     * )
     */
    public function __invoke(ShippingQuoteRequest $request)
    {
        $this->modelShippingQuote->saveShippingQuote(
            $request->uf,
            $request->percentual_cotacao,
            $request->valor_extra,
            $request->transportadora_id
        );

        return response()->json([
            'message' => 'Sucesso'
        ], 200);
    }
}
