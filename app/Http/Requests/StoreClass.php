<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClass extends FormRequest
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
            'Building' => 'required|string|unique:classrooms',
            'ClassID' => 'required|string|max:50|unique:classrooms',
            'Capacity' => 'required'
        ];
    }
   
    public function messages()
{
    return [
        'Building.required' => 'A title is required',
        'ClassID.required'  => 'A message is required',
        'Building.unique' => 'There exist a class with the same name',
        'ClassID.unique' => 'There exist a class with the same ID',
    ];

}
}
