<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'index' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'text',
            ],
            'fabric' => [
                'required',
                Rule::exists('fabrics', 'id')
            ],
        ];
    }
}
