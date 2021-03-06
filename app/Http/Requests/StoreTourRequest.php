<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'nombre'=> 'required|string|max:255',
            'descripcion'=> 'required',
            'planing'=> 'required',
            'tipo'=> 'required|string|max:255',
            'imagen'=> 'required|image',
            'precio'=> 'required|numeric',
            'duracion'=> 'required',
            'valoracion'=> 'required|integer',
            'latitud'=> 'required|string|max:255',
            'longitud'=> 'required|string|max:255',
        ];
    }
}
