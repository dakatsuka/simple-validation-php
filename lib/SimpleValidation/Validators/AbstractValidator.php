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

    public function run($value)
    {
        if ($this->validate($value)) {
            $this->removeError();
        } else {
            $this->addError();
        }
    }

    protected function validate($value)
    {
        throw new \Exception('Subclass must implement a validate()');
    }

    protected function addError()
    {
        if (is_array($this->options) && array_key_exists('message', $this->options)) {
            $this->instance->errors[$this->property] = $this->options['message'];
        } else {
            $this->instance->errors[$this->property] = $this->property." cant't be blank.";
        }
    }

    protected function removeError()
    {
        if (array_key_exists($this->property, $this->instance->errors)) {
            unset($this->instance->errors[$this->property]);
        }
    }
}
