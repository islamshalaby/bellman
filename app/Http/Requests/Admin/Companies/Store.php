<?php

namespace App\Http\Requests\Admin\Companies;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['email', 'nullable'],
            'logo' => ['dimensions:min_width=100,min_height=100', 'nullable'],
            'website' => ['url', 'nullable']
        ];
    }
}
