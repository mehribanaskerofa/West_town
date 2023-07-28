<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'block'=>'numeric|min:0',
            'rooms'=>'numeric|min:0',
            'date'=>'date|after:today',
            'project_id'=>'numeric|exists:projects,id',
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg,webp'],
//            'layout'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg,webp'],
        ];
        return ($data);
    }

}
