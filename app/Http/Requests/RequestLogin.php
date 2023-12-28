<?php

namespace App\Http\Requests;

use App\Rules\ReCaptcha;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => ['required', new ReCaptcha],
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
