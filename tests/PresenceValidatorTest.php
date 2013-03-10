<?php
require_once(dirname(__FILE__)."/../vendor/autoload.php");
require_once(dirname(__FILE__)."/models/presence.php");

class PresenceValidatorTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->model = new WithPresenceValidation();
    }

    public function testShouldBeInvalid()
    {
        $this->model->name = "";
        $this->model->age  = null;
        $this->assertFalse($this->model->isValid());
        $this->assertTrue($this->model->isInvalid());
    }

    public function testShouldBeValid()
    {
        $this->model->name = "akatsuka";
        $this->model->age  = 0;
        $this->assertTrue($this->model->isValid());
        $this->assertFalse($this->model->isInvalid());
    }
}
