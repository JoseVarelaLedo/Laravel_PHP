<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{    
    public function authorize(): bool
    {
        return true;
    }
    /**  
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             //para el título, que sea obligatorio, y longitud máx de 255 caracteres, mín 3
            'title'=> 'required|max:255|min:3',
            //ídem descripción
            'description' => 'required|max:255|min:3'
        ];
    }
}