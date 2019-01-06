<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductRequest
 *
 * @package App\Http\Requests
 *
 * @property int $id
 * @property array $items
 */
class StoreDropdownRequest extends FormRequest
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
        // usually here we would get product id
        // from route biding and find out which attributes are required

        return [
            'brand' => 'required',
            'colour' => 'required',
            'size' => 'required',
        ];
    }
}
