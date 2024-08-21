<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'idade' => 'required|integer|min:1|max:100',
            'nota_primeiro_semestre' => 'required|numeric|min:0|max:10',
            'nota_segundo_semestre' => 'required|numeric|min:0|max:10',
            'nome_professor' => 'required|string|max:100',
            'numero_sala' => 'required|integer|min:1|max:99999',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'idade.required' => 'O campo idade é obrigatório.',
            'idade.integer' => 'O campo idade deve ser um número inteiro.',
            'idade.min' => 'A idade mínima permitida é 1.',
            'idade.max' => 'A idade máxima permitida é 100.',
            'nota_primeiro_semestre.required' => 'A nota do primeiro semestre é obrigatória.',
            'nota_primeiro_semestre.numeric' => 'A nota do primeiro semestre deve ser numérica.',
            'nota_primeiro_semestre.min' => 'A nota do primeiro semestre deve ser no mínimo 0.',
            'nota_primeiro_semestre.max' => 'A nota do primeiro semestre deve ser no máximo 10.',
            'nota_segundo_semestre.required' => 'A nota do segundo semestre é obrigatória.',
            'nota_segundo_semestre.numeric' => 'A nota do segundo semestre deve ser numérica.',
            'nota_segundo_semestre.min' => 'A nota do segundo semestre deve ser no mínimo 0.',
            'nota_segundo_semestre.max' => 'A nota do segundo semestre deve ser no máximo 10.',
            'nome_professor.required' => 'O campo nome do professor é obrigatório.',
            'nome_professor.max' => 'O campo nome do professor deve ter no máximo 100 caracteres.',
            'numero_sala.required' => 'O número da sala é obrigatório.',
            'numero_sala.integer' => 'O número da sala deve ser um número inteiro.',
            'numero_sala.min' => 'O número da sala deve ser no mínimo 1.',
            'numero_sala.max' => 'O número da sala deve ser no máximo 99999.',
        ];
    }
}
