<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseValidation extends FormRequest
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
            'name' =>'required|unique:courses',
        ];
    }

    public function messages()
    {
       return [
        'name.required'=>'This is a test',
       ];
    }
}
