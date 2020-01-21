<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyCreateRequest extends FormRequest
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
            'address'   => 'required',
            'town_id'   => 'required',
            'rent'      => 'required',
            'state_id'  => 'required',
            'bedrooms'  => 'required',
            'bathrooms' => 'required',
            'body'      => 'required',
        ];
    }
}
