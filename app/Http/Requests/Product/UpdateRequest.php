<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'array|required|nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле необхідно заповнити',
            'description.required' => 'Це поле необхідно заповнити',
            'category_id.required' => 'Це поле необхідно заповнити',

        ];

    }
}
