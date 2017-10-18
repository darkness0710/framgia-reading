<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|digits_between:1,2',
            'publisher' => 'required|string|max:255',
            'pages' => 'required|digits_between:1,10000|max:255',
            'summary' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'category' => 'required|string',
            'year' => 'required|date',
            'cover' => 'image',
        ];
    }
}
