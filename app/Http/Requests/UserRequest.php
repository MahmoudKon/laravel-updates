<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:2|max:190',
            'email'    => 'required|email|unique:users,email,'.$this->route('user'),
            'password' => (request()->method() == 'POST' ? 'required' : 'nullable').'|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => trans('users.name'),
            'email'    => trans('users.email'),
            'password' => trans('users.password'),
        ];
    }

    protected function prepareForValidation(): void
    {
        if ( is_null($this->password) ) $this->request->remove('password');
    }
}
