<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFrontRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'phone'=>'required',
            'notice'=>'nullable',
        ];
        return $data;
    }
}
