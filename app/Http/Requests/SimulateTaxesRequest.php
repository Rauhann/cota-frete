<?php

namespace App\Http\Requests;

use App\Helpers\State;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SimulateTaxesRequest extends FormRequest
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
            'uf' => 'required|exists:cotacao_frete,uf|in:' . implode(',', $this->getAllStates()),
            'valor_pedido' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'uf.required' => 'O campo uf é obrigatório',
            'uf.in' => 'O campo uf é inválido',
            'uf.exists' => 'A cotacao de frete para esse estado não existe',
            'valor_pedido.required' => 'O campo valor_pedido é obrigatório',
            'valor_pedido.numeric' => 'O campo valor_pedido deve ser um número válido',
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
