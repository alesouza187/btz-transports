<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoFromRequest extends FormRequest
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
            'nome' => 'required',
            'tipo_combustivel_id' => 'required|numeric',
            'placa' => 'required',
            'nome_fabricante' => 'required',
            'ano_fabricacao' => 'required|numeric',
            'capacidade_tanque' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'max' => 'O campo :attribute precisa ter no minimo 2 caracteres!',
            'numeric' => 'O campo :attribute precisa ter apenas números!'
        ];
    }
}
