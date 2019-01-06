<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelperTest extends TestCase
{
    /**
     * @test
     */
    public function identifies_empty_value()
    {
        $this->assertTrue(is_empty(''));
        $this->assertTrue(is_empty(false));
        $this->assertTrue(is_empty(null));
    }

    /**
     * @test
     */
    public function identifies_non_empty_value()
    {
        $this->assertFalse(is_not_empty(''));
        $this->assertFalse(is_not_empty(false));
        $this->assertFalse(is_not_empty(null));

        $this->assertTrue(is_not_empty(0));
        $this->assertTrue(is_not_empty('1'));
        $this->assertTrue(is_not_empty(' '));
    }
}
