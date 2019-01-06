<?php

namespace App\Http\Requests;

use App\Rules\Password;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'in:1,2,3,4,5'],
            'first_name' => ['present', 'min:2', 'max:30'],
            'last_name' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'email'],
            'password' => ['required', new Password],
            'address' => 'array',
            'address.line_1' => 'required',
            'address.line_2' => 'present',
            'address.town' => 'required',
            'address.post_code' => ['required', 'max:10'],
            'share' => ['required', 'in:a'],
            'privacy' => 'required',
            'terms' => 'accepted',
            'colours' => ['required', 'array', 'min:2', 'max:2'],
            'city' => ['required', 'in:1,2,3,6'],
            'fruit' => ['required', 'array'],
            'excerpt' => ['required', 'min:3', 'max:10'],
            'body' => 'required',
        ];
    }
}
