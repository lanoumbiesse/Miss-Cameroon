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
        'nom' => 'required|min:2|max:120|string',
        'prenom' => 'required|min:3|max:120|string',
        'datenais' => 'nullable|numeric',
        'numcompet' => 'required|numeric',
        'height' => 'nullable|string',
        'ro'  => 'required',
        'rc' => 'required',
        'niveau'  => 'required',
        'bust'  => 'nullable|string',
        'waist'  => 'nullable|string',
        'hips'  => 'nullable|string',
        'shoes'  => 'nullable|string',
        'eyes'  => 'nullable|string',
        'fb'  => 'nullable|url',
        'tw'  => 'nullable|url',
        'in'  => 'nullable|url',
        'vi'  => 'nullable|url',
        'description' => 'nullable|max:520|string',
        'first' => 'required|image|mimes:jpeg,png,jpg,gif',
        'p1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'p2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'p3' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
