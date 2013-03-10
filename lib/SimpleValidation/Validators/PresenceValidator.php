<?php
namespace SimpleValidation\Validators;

class PresenceValidator extends AbstractValidator
{
    protected function validate($value)
    {
        return !($value === null || $value === "");
    }
}
