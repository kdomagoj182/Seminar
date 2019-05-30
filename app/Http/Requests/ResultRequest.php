<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'isolation'=>'required',
            'going_out'=>'required',
            'school'=>'required'
        ];
    }
    public function messages()
   {
       return[
           'isolation.required' => 'Tvrdnja 1 je obavezna!',
           'going_out.required'=> 'Tvrdnja 2 je obavezna!',
           'school.required'=> 'Tvrdnja 3 je obavezna!',
       ];
   }
}
