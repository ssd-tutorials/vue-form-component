<?php

namespace Tests\Feature;

use Tests\TestCase;

class DropdownTest extends TestCase
{
    /**
     * @test
     */
    public function validates_request()
    {
        $response = $this->postJson(route('dependable_dropdown.store'));

        $response->assertJson($this->validationError([
            'brand' => ['required'],
            'colour' => ['required'],
            'size' => ['required'],
        ]));
    }
}
