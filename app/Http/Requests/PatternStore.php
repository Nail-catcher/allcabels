<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatternStore extends FormRequest
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
            'pattern'=> [
                'nullable',
                'string',
                'max:255'

            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'fabric' => [
                'required',
                'string',
//                Rule::exists('fabrics', 'id')
            ],
            'guides' => [
                'nullable',
               'array'
            ],
            'guides.*' => [
                'required',
               // Rule::exists('guides', 'id')
            ],
//
//            'conflicts' => [
//                'nullable',
//                'array'
//            ],
//            'conflicts.*' => [
//                'require',
//                Rule::exists('conflicts', 'id')
//            ],
        ];
    }
}
