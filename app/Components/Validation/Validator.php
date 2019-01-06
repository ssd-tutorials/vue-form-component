<?php

namespace App\Components\Validation;

use Illuminate\Support\Str;
use Illuminate\Validation\Validator as ValidationValidator;

class Validator extends ValidationValidator
{
    /**
     * Validate an attribute using a custom rule object.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \App\Components\Validation\RuleContract  $rule
     * @return void
     */
    protected function validateUsingCustomRule($attribute, $value, $rule)
    {
        if (! $rule->passes($attribute, $value)) {

            if (!request()->expectsJson()) {
                parent::validateUsingCustomRule($attribute, $value, $rule);
                return;
            }

            $this->failedRules[$attribute][$rule->rule()] = [];

            $this->messages->add($attribute, $rule->rule());
        }
    }

    /**
     * Add a failed rule and error message to the collection.
     *
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return void
     */
    public function addFailure($attribute, $rule, $parameters = [])
    {
        if (!request()->expectsJson()) {
            parent::addFailure($attribute, $rule, $parameters);
            return;
        }

        $this->messages->add($attribute, Str::snake($rule));

        $this->failedRules[$attribute][$rule] = $parameters;
    }
}