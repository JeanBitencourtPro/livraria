<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreLivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'numero_paginas' => 'required|integer',
            'descricao' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'Preencha o Título.',
            'autor.required' => 'Preencha o Autor.',
            'numero_paginas.required' => 'Preencha o Número de Páginas.',
            'numero_paginas.integer' => 'O campo precisa ser do tipo Inteiro.',
            'descricao.required' => 'Preencha a Descrição.'
        ];
    }
}
