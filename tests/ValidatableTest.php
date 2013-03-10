<?php
require_once(dirname(__FILE__)."/../vendor/autoload.php");
require_once(dirname(__FILE__)."/models/validatable.php");

class ValidatableTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->withValidations = new ValidatableWithValidations();
        $this->withoutValidations = new ValidatableWithoutValidations();
    }

    public function testIsValid()
    {
        $this->assertTrue($this->withValidations->isValid());
        $this->assertFalse($this->withValidations->isInvalid());
        $this->assertTrue($this->withoutValidations->isValid());
        $this->assertFalse($this->withoutValidations->isInvalid());
    }
}
