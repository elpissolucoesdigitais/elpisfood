<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
        $id = $this->segment(3);

         $rules = [
            'title' => [
            'required',
            'string',
            'min:3',
            'max:255',
            new UniqueTenant('products', $id)
            ],

            'description' => "required|string|min:5|max:500",
            'image' => "required|image",
            'price'=>"required|numeric"
        ];
        if($this->method() == 'PUT')
        {
            $rules['image']="nullable|image";
        }
        return $rules;
    }
}
