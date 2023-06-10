<?php

namespace App\Http\Requests\User;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'              => 'required',
            'surname'           => 'required',
            'phonenumber'       => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'national_code'     => ['required', new Nationalcode],
            'gender'            => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:8',
        ];
    }
}
