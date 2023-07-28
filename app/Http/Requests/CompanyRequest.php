<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'email'=>'required',
            'phone'=>'required',
            'iframe'=>'required',
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg,webp'],
            'visual'=>'required',//kamera
            'project_count'=>'nullable',
            'block_count'=>'nullable',
            'house_count'=>'nullable',
            'date'=>'date|after:today',
            'color'=>'nullable',
            'options'=>'nullable|array',
            'options.*'=>'nullable|exists:options,id'
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='required|string|min:2';
            $data["$lang.description"]='required|string|min:2';
            $data["$lang.address"]='required|string|min:2';
            $data["$lang.zone"]='nullable';
            $data["$lang.territory"]='nullable';
        }
        return $data;
    }
}
