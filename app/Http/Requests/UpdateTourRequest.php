<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'planing' => 'required',
            'tipo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'duracion' => 'required',
            'valoracion' => 'required|integer',
            'latitud' => 'required|string|max:255',
            'longitud' => 'required|string|max:255',
        ];
    }
}
