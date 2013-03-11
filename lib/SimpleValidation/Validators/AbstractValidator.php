<?php
namespace SimpleValidation\Validators;

/**
 *
 */
abstract class AbstractValidator
{
    public function __construct($instance, $property, $options)
    {
        $this->instance = $instance;
        $this->property = $property;
        $this->options  = $options;
    }

    public function validate($value)
    {
        throw new \Exception('Subclass must implement a validate()');
    }
}
