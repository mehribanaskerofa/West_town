<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg'],
            'icon'=>'nullable',
            'email'=>'required',
            'phone'=>'required',
            'active'=>'nullable|boolean'
        ];
        return $data;
    }
}
