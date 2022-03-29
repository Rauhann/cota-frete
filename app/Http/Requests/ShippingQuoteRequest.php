<?php

namespace App\Http\Requests;

use App\Helpers\State;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ShippingQuoteRequest extends FormRequest
{
    use State;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transportadora_id' => 'required|exists:transportadoras,id|' . Rule::unique('cotacao_frete')->where('uf', $this->uf),
            'uf' => 'required|in:' . implode(',', $this->getAllStates()) . '|' . Rule::unique('cotacao_frete')->where('transportadora_id', $this->transportadora_id),
            'percentual_cotacao' => 'required|numeric',
            'valor_extra' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'transportadora_id.required' => 'O campo transportadora_id é obrigatório',
            'transportadora_id.unique' => 'transportadora_id já associado ao uf',
            'transportadora_id.exists' => 'A transportadora não existe no banco de dados',
            'uf.required' => 'O campo uf é obrigatório',
            'uf.in' => 'O campo uf é inválido',
            'uf.unique' => 'uf já associado a transportadora_id',
            'percentual_cotacao.required' => 'O campo percentual_cotacao é obrigatório',
            'percentual_cotacao.numeric' => 'O campo percentual_cotacao deve ser um número válido',
            'valor_extra.required' => 'O campo valor_extra é obrigatório',
            'valor_extra.numeric' => 'O campo valor_extra deve ser um número válido',
        ];
    }

    public function expectsJson()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
