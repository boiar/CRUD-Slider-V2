<?php

namespace App\Http\Requests;

use App\Models\Lang;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class SaveAdminRequest extends FormRequest
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

        $rules =  [
            "user_name"          => "required|string",
            "user_email"         => "required|string|email",
        ];


        if (is_null($this->request->get('user_id'))){
            $rules['password']         = "required|string|min:5";
            $rules['confirm_password'] = "required|string|min:5|same:password";
        }
        else{
            $rules['password']         = "string|min:5";
            $rules['confirm_password'] = "string|min:5|same:password";

        }
        return $rules;
    }

    public function messages()
    {
        return [
            'user_name.required'          => __('site_admin.rule_user_name.required'),
            'user_name.string'            => __('site_admin.rule_user_name.string'),
            'user_email.required'         => __('site_admin.rule_user_email.required'),
            'user_email.string'           => __('site_admin.rule_user_email.string'),
            'user_email.email'            => __('site_admin.rule_user_email.email'),
            'password.required'           => __('site_admin.rule_password.required'),
            'password.string'             => __('site_admin.rule_password.string'),
            'password.min'                => __('site_admin.rule_password.min'),
            'confirm_password.required'   => __('site_admin.rule_confirm_password.required'),
            'confirm_password.string'     => __('site_admin.rule_confirm_password.string'),
            'confirm_password.min'        => __('site_admin.rule_confirm_password.min'),
            'confirm_password.same'       => __('site_admin.rule_confirm_password.same'),

        ];
    }

}
