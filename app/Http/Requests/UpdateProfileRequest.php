<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'address' => 'required|min:1|max:80',
            'first_name' => 'required|alpha|min:1|max:20',
            'last_name' => 'required|alpha|min:1|max:20',
            'phone' =>  'required|numeric|digits:10'
        ];
    }
}
