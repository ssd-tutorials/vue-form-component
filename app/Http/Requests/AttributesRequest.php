<?php

namespace App\Http\Requests;

use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductRequest
 *
 * @package App\Http\Requests
 *
 * @property int $id
 * @property array $items
 */
class AttributesRequest extends FormRequest
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
            'id' => 'required',
            'items' => 'required|array'
        ];
    }

    /**
     * Get only non empty input.
     *
     * @return \Illuminate\Support\Collection
     */
    public function nonEmpty(): Collection
    {
        return collect($this->items)->filter('is_not_empty');
    }

    /**
     * Get sizes.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function sizes(): Collection
    {
        return new Collection([
            [
                'name' => 10,
                'value' => 1,
            ],
            [
                'name' => 12,
                'value' => 2,
            ]
        ]);
    }

    /**
     * Get response data set.
     *
     * @return array
     */
    public function data(): array
    {
        switch($this->id) {
            case 'colour':
                return $this->colour();
            case 'brand':
                return $this->brand();
            default:
                return [];
        }
    }

    /**
     * Get colours.
     *
     * @return array
     */
    private function colour(): array
    {
        switch($this->items['size']) {
            case 1:
                return [
                    [
                        'name' => 'Green',
                        'value' => 3
                    ],
                    [
                        'name' => 'Orange',
                        'value' => 4
                    ]
                ];
            case 2:
                return [
                    [
                        'name' => 'Brown',
                        'value' => 5
                    ],
                    [
                        'name' => 'Pink',
                        'value' => 6
                    ]
                ];
            default:
                return [];
        }
    }

    /**
     * Get brands.
     *
     * @return array
     */
    private function brand(): array
    {
        switch($this->items['colour']) {
            case 3:
                return [
                    [
                        'name' => 'Apple',
                        'value' => 7
                    ],
                    [
                        'name' => 'Orange',
                        'value' => 8
                    ]
                ];
            case 4:
                return [
                    [
                        'name' => 'Banana',
                        'value' => 9
                    ],
                    [
                        'name' => 'Peach',
                        'value' => 10
                    ]
                ];
            case 5:
                return [
                    [
                        'name' => 'Plum',
                        'value' => 11
                    ],
                    [
                        'name' => 'Avocado',
                        'value' => 12
                    ]
                ];
            case 6:
                return [
                    [
                        'name' => 'Strawberry',
                        'value' => 13
                    ],
                    [
                        'name' => 'Blueberry',
                        'value' => 14
                    ]
                ];
            default:
                return [];
        }
    }
}
