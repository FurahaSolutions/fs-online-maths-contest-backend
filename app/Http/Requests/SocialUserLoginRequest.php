<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialUserLoginRequest extends FormRequest
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
        return [
            'authToken' => 'required',
            'email' => 'required | email',
            'name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'provider' => 'required',
            'photoUrl' => 'url',
            'id' => 'required',
            'idToken' => 'required'
        ];
    }

    /**
     * Messages if validation requests fail.
     *
     * @return array
     */

    public function messages()
    {
        return [

            'authToken.required' => 'The Auth Token was not provided',
            'email.required' => 'The email field is required',
            'email.email' => 'The email field must be a valid email',
            'name.required' => 'The name field must be provided',
            'firstName.required' => 'The first name field is required',
            'lastName.required' => 'The last name field is required',
            'provider.required' => 'The login provider is required',
            'photoUrl.required' => 'The Photo Link is required',
            'id.required' => 'Id Field is required',
            'idToken.required' => 'Id Token Field is required',
        ];
    }
}
