<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BilletInscriptionRequest extends FormRequest
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
            //
        'nom' => 'required|min:2|max:20|string',
        'prenom' => 'required|min:3|max:20|string',
        'email'  => 'required|email',
        'numtel'  => 'required|min:7|max:60|string',
        'cni' =>  'nullable',
        'nbre_billet' => 'required|integer',
        'type_billet' => 'nullable',
        
        ];
    }
}
