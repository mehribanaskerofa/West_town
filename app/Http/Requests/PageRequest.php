<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'image','mimes:jpg,jpeg,png,svg'],
            'active'=>'nullable|boolean'
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='required|string|min:2';
            $data["$lang.description"]='nullable';
            $data["$lang.button"]='required|string|min:2';
            $data["$lang.slug"]=[
                'required','string',
                Rule::unique('page_translations','slug')
                    ->where('locale',$lang)
                    ->ignore($this->route('page')?->id,'page_id')];
        }
        return $data;
    }
}
