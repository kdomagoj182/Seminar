<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=>'required|min:2',
			      'surname'=>'required|min:2',
            'birthday'=>'required|date:d.M.Y',
            'oib'=>'required|size:11',
            'address'=>'required',
            'homenumber'=>'required',
            'hometown'=>'required'
        ];
    }

    public function messages()
   {
       return[
           'name.required' => 'Ime je obavezno!',
           'surname.required'=> 'Prezime je obavezno!',
           'birthday.required'=> 'Datum rođenja je obavezan!',
           'oib.required'=> 'OIB je obavezan!',
           'address.required'=> 'Adresa je obavezna!',
           'homenumber.required'=> 'Kućni broj je obavezan!',
           'hometown.required'=> 'Grad je obavezan!',
       ];
   }
}
