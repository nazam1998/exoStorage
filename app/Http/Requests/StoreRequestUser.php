<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestUser extends FormRequest
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
            'nom'=>'required|min:3|alpha',
            'email'=>'required|email|unique:users',
            'age'=>'required|integer|max:110',
            'url_photo'=>'nullable|required_without:file_photo|url',
            'file_photo'=>'required_without:url_photo|image'
        ];
    }
}
