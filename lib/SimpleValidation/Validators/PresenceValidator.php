<?php
namespace SimpleValidation\Validators;

class PresenceValidator extends AbstractValidator
{
    public function validate($value)
    {
        if ($value === null || $value === "") {
            $this->instance->errors->add($this->property, "blank");
        }
    }
}
