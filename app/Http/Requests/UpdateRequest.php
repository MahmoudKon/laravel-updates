<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'link'    => 'required_without:file',
            'file'    => 'required_without:link|file|mimes:rar,zip',
            'path'    => 'required|string',
            'about'   => 'required|string|min:10',
            'type'    => 'required|boolean|in:0,1',
            'version' => 'required|string|unique:updates,version,'.$this->route('id'),
        ];
    }

    public function attributes(): array
    {
        return [
            'link'    => trans('updates.link'),
            'file'    => trans('updates.file'),
            'path'    => trans('updates.path'),
            'about'   => trans('updates.about'),
            'type'    => trans('updates.type'),
            'version' => trans('updates.version'),
        ];
    }
}
