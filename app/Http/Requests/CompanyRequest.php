<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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

        // $id = null;
        // if(strtolower($this->method()) === 'put'){
        // $id = $this->route('company');
        // }
        // return [
        //     'name' => 'required|max:255',
        //     'email' => "nullable|email|unique:companies,email,$id",
        //     'logo' => 'file|mimes:jpeg,bmp,png,jpg,gif|dimensions:min_width=100,min_height=100',
        //     'website' => 'nullable|url'
        // ];
        if(strtolower($this->method()) === 'put'){
            $id = $this->route('company');
            return [
                'name' =>  'nullable',
                'logo' => 'nullable'
            ];
        }

        return [
            'name' =>  'required',
            'logo' => 'required'
            // 'logo ' =>  'required|file|mimes:jpeg,bmp,png,jpg,gif|dimensions:min_width=100,min_height=100',
        ];
    }
}
