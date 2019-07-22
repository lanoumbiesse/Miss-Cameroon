<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttribuervoteRequest extends FormRequest
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
        'montant' => 'required|min:0|numeric',
        'nbre_vote' => 'required|min:1|numeric',
        ];
    }
}
