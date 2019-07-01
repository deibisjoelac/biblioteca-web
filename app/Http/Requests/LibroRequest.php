<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
				$rules = [
                    'nombre' =>'required|min:4|unique:libros,nombre',
                    'editorial' =>'required|min:4',
                    'categoria' =>'required|min:4',
                    'autor' =>'required|min:4',
                    'numero_paginas' => 'required|min:0|numeric',
                    'stock' => 'required|min:0|numeric',
                    'descripcion' => 'nullable',
                    'portada' => 'required|file|mimes:jpeg,bmp,png',
                    'libro_pdf' => 'required|file|mimes:pdf'
                ];
                return $rules;
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules = [
                    'nombre' =>'required|min:4|unique:libros,nombre,'.$libro->id,
                    'editorial' =>'required|min:4',
                    'categoria' =>'required|min:4',
                    'autor' =>'required|min:4',
                    'numero_paginas' => 'required|min:0|numeric',
                    'stock' => 'required|min:0|numeric',
                    'descripcion' => 'nullable',
                    'portada' => 'required|file|mimes:jpeg,bmp,png',
                    'libro_pdf' => 'required|file|mimes:pdf'
                ];
                return $rules;
            }
            default:break;
        }

    }
}
