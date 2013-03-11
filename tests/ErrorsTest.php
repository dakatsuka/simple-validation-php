<?php
require_once(dirname(__FILE__)."/../vendor/autoload.php");

use SimpleValidation\Errors;

class ErrorsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->errors = new Errors();
    }

    public function testAdd()
    {
        $this->errors->add("name", "invalid");
        $this->assertEquals($this->errors["name"], "invalid");
    }

    public function testAddIfMessageIsEmpty()
    {
        $this->errors->add("name");
        $this->assertEquals($this->errors["name"], "invalid");
    }

    public function testClear()
    {
        $this->errors->add("name", "invalid");
        $this->errors->clear();
        $this->assertEquals($this->errors->count(), 0);
        $this->assertFalse(array_key_exists("name", $this->errors));
    }
}
