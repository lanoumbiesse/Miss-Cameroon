<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
        'datenais' => 'required|date',
        'lieunais' => 'required|min:3|max:20|string',
        'pays' => 'required|min:3|max:20|string',
        'ro'  => 'required',
        'rc' => 'required',
        'niveau'  => 'required',
        'numtel'  => 'required|min:13|max:60|string',
        'email'  => 'required|email',
        'fb'  => 'required|url',
        'tw'  => 'required|url',
        'in'  => 'required|url',
        'description' => 'required|min:50|max:520|string',
        'annee'  => 'required|min:4|numeric',
        'first' => 'required|image',
        'p1' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'p2' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'p3' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
