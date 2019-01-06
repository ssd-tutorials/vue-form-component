<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Support\Str;

class MainTest extends TestCase
{
    /**
     * Get request data.
     *
     * @param  array $replace
     * @return array
     */
    private function data(array $replace = []): array
    {
        return array_replace_recursive([
            'title' => 1,
            'first_name' => 'Jon',
            'last_name' => 'Doe',
            'email' => 'jon@doe.com',
            'password' => 'Pa55w0rd!',
            'address' => [
                'line_1' => 'Address line 1',
                'line_2' => 'Address line 2',
                'town' => 'London',
                'post_code' => 'LN20'
            ],
            'share' => 'a',
            'privacy' => true,
            'terms' => true,
            'colours' => ['blue', 'green'],
            'city' => 1,
            'fruit' => ['apple', 'banana'],
            'excerpt' => 'Excerpt',
            'body' => '<h1>Header</h1>',
        ], $replace);
    }

    /**
     * @test
     */
    public function validation_fails_with_empty_request()
    {
        $response = $this->postJson(route('main.store'));

        $response->assertExactJson($this->validationError([
            'title' => ['required'],
            'first_name' => ['present'],
            'last_name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'address.line_1' => ['required'],
            'address.line_2' => ['present'],
            'address.town' => ['required'],
            'address.post_code' => ['required'],
            'share' => ['required'],
            'privacy' => ['required'],
            'terms' => ['accepted'],
            'colours' => ['required'],
            'city' => ['required'],
            'fruit' => ['required'],
            'excerpt' => ['required'],
            'body' => ['required'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_minimum_string_length_not_met()
    {
        $response = $this->postJson(route('main.store'), $this->data([
            'first_name' => 'S',
            'last_name' => 'S',
            'excerpt' => 'Ex',
        ]));

        $response->assertExactJson($this->validationError([
            'first_name' => ['min'],
            'last_name' => ['min'],
            'excerpt' => ['min'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_maximum_string_length_exceeded()
    {
        $response = $this->postJson(route('main.store'), $this->data([
            'first_name' => $string31 = Str::random(31),
            'last_name' => $string31,
            'address' => [
                'post_code' => '12345678910'
            ],
            'excerpt' => '12345678910',
        ]));

        $response->assertExactJson($this->validationError([
            'first_name' => ['max'],
            'last_name' => ['max'],
            'address.post_code' => ['max'],
            'excerpt' => ['max'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_minimum_array_count_not_met()
    {
        // need it this way because replace recursive won't replace if empty array
        $response = $this->postJson(route('main.store'), array_merge(
            $this->data(),
            ['colours' => ['blue']]
        ));

        $response->assertExactJson($this->validationError([
            'colours' => ['min'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_maximum_array_count_exceeded()
    {
        $response = $this->postJson(route('main.store'), $this->data([
            'colours' => ['blue', 'orange', 'yellow']
        ]));

        $response->assertExactJson($this->validationError([
            'colours' => ['max'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_invalid_password()
    {
        $response = $this->postJson(route('main.store'), $this->data([
            'password' => 'password'
        ]));

        $response->assertExactJson($this->validationError([
            'password' => ['password'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_invalid_checkbox_value()
    {
        $data = $this->data([
            'share' => 'b',
            'terms' => false,
        ]);

        unset($data['privacy']);

        $response = $this->postJson(route('main.store'), $data);

        $response->assertExactJson($this->validationError([
            'share' => ['in'],
            'privacy' => ['required'],
            'terms' => ['accepted'],
        ]));
    }

    /**
     * @test
     */
    public function validation_fails_with_value_not_found_in_collection()
    {
        $response = $this->postJson(route('main.store'), $this->data([
            'title' => 6,
            'city' => 4,
        ]));

        $response->assertExactJson($this->validationError([
            'title' => ['in'],
            'city' => ['in'],
        ]));
    }

    /**
     * @test
     */
    public function validation_succeeds_with_json_response()
    {
        $response = $this->postJson(route('main.store'), $this->data());

        $response->assertExactJson([
            'behaviour' => 'confirmWithDialogAndReset',
            'message' => 'Your request has been processed successfully.'
        ]);
    }
}
