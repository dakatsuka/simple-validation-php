<?php
use SimpleValidation\Validatable;

class ValidatableWithoutValidations
{
    use Validatable;

    public $name;
    public $age;
}

class ValidatableWithValidations
{
    use Validatable;

    public $name;
    public $age;

    protected $validations = [];
}
