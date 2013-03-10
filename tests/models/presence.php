<?php
use SimpleValidation\Validatable;

class WithPresenceValidation
{
    use Validatable;

    public $name;
    public $age;

    protected $validations = [
        "name" => ["presence" => true],
        "age"  => ["presence" => ["message" => "custom message"]]
    ];
}
