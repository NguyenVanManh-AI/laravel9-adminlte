<?php

namespace App\Http\Requests;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateInforAdmin extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error);
            }
        }
    }
}
