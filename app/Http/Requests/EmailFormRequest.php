<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\ValidationRules\Rules\Delimited;

class EmailFormRequest extends FormRequest
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
            'emails' => [(new Delimited('email'))->doNotTrimItems()],
            'subject' => 'required|min:3',
            'body' => 'required|min:3',
            'attachments' => 'required|array',
            'attachments.*' => 'sometimes|string|base64file',
        ];
    }
}
