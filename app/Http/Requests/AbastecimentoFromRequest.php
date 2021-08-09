<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbastecimentoFromRequest extends FormRequest
{
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
            'motorista_id' => 'required',
            'veiculo_id' => 'required',
            'tipo_combustivel_id' => 'required',
            'abastecimento' => 'required',
            'quantidade' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'numeric' => 'O campo :attribute precisa ter apenas números!'
        ];
    }
}
