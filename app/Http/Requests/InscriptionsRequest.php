<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionsRequest extends FormRequest
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
        'age' => 'required|numeric',
        'email'  => 'required|email',
        'numtel'  => 'required|max:60|string',
        'niveau'  => 'required',
        'profession' => 'required|min:4|max:20|string',
        'ville'  => 'required|min:2|string',
        'quartier'  => 'required|min:2|string',
        'facebook'  => 'required|url',
        'instagram'  => 'required|url',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        'Ro'  => 'required',
        'Rc' => 'required',
        'pays'  => 'required|min:2|string'
        
        ];
    }
}
