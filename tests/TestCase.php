<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Get validation response.
     *
     * @param  array  $response
     * @param  string  $message
     * @return array
     */
    protected function validationError(array $response, string $message = 'The given data was invalid.'): array
    {
        return [
            'message' => $message,
            'errors' => $response
        ];
    }
}
