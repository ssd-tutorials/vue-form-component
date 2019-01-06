<?php

if (!function_exists('is_empty')) {
    /**
     * Determine if value is empty.
     *
     * @param  mixed $value
     * @return bool
     */
    function is_empty($value): bool
    {
        return empty($value) && !is_numeric($value);
    }
}

if (!function_exists('is_not_empty')) {
    /**
     * Determine if value is not empty.
     *
     * @param  mixed $value
     * @return bool
     */
    function is_not_empty($value): bool
    {
        return !is_empty($value);
    }
}