<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffNewRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'max:150|nullable',
            'type' => 'required|max:30',
            'photo' => 'nullable|image|max:1024',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must enter a name for the new staff member',
            'name.max' => 'The name of the new member cannot be more than 50 characters',
            'email.required' => 'You must enter a valid email address',
            'email.unique' => 'This email address is already registered on this site',
            'phone.max' => 'Phone names must have a maximum of 150 characters',
            'type.required' => 'You must select a role for the staff member',
            'photo.image' => 'The selected file must be of .jpg, .bmp, .gif or other image type',
            'photo.max' => 'The selected image cannot be more than 1 Mb',
            'password.required' => 'You must set a password for the staff member',
            'password.min' => 'The selected password must have at least 8 characters',
            'password.confirmed' => 'You have not confirmed the password correctly',
            'password_confirmation.same' => 'Password confirmation is wrong',
        ];
    }
}
