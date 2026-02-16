<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RappiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

public function rules(): array
{
    $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

    return [
        'name' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
        'producto' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
        'precio' => $isUpdate ? 'sometimes|required|numeric' : 'required|numeric',
        'cantidad' => $isUpdate ? 'sometimes|required|integer' : 'required|integer',
        'descripcion' => 'nullable|string',
    ];  
}

public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no puede exceder los 255 caracteres.',
            'producto.required' => 'El campo producto es obligatorio.',
            'producto.string' => 'El campo producto debe ser una cadena de texto.',
            'producto.max' => 'El campo producto no puede exceder los 255 caracteres.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'cantidad.required' => 'El campo cantidad es obligatorio.',
            'cantidad.integer' => 'El campo cantidad debe ser un número entero.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
        ];
    }
}
