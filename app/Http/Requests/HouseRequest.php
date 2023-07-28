<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HouseRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'type'=>'numeric|min:0',
            'floor'=>'numeric|min:0',
            'room'=>'numeric|min:0',
            'area'=>'string',
            'date'=>'date|after:today',
            'block_id'=>'numeric|exists:blocks,id',
            'active'=>'nullable|boolean',
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg,webp'],
            'layout'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg,webp'],
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='string';
            $data["$lang.description"]='string';
            $data["$lang.price"]='string';
        }
        return $data;
    }
}
