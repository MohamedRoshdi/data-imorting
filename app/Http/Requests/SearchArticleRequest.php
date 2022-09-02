<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchArticleRequest extends FormRequest
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
            'search_key' => 'required|in:product_name,part_number,articel_group_Id,prize',
            'search_value' => 'required'
        ];
    }
}
