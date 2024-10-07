<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|max:5', 
            'password'=>'required|max:5'
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'متسبهوش فاضي يبن العرص',
            'password.required'=>'متسبهوش فاضي يبن العرص',
             'email.max'=>'اخرك خمسه يكسمك',
             'password.max'=>'اخرك خمسه يكسمك'
        ];
    }
}
