<?php
namespace SimpleValidation;

/**
 * Validation framework for PHP >=5.4.0
 *
 * @author Dai Akatsuka <d.akatsuka@gmail.com>
 * @see https://github.com/dakatsuka/simple-validation-php
 */
trait Validatable
{

    /**
     * Array of error messages stored.
     */
    public $errors = [];

    /**
     * Run all validations and returns boolean.
     * Returns true if there is no errors.
     *
     * <pre>
     * use SimpleValidation\Validatable;
     *
     * class Person
     * {
     *     use Validatable;
     *
     *     public $name;
     *     private $validations = [
     *         "name" => ["presence" => true]
     *     ];
     * }
     *
     * $person = new Person();
     * $person->name = "";
     * $person->isValid(); // => false
     * $person->name = "dai";
     * $person->isValid(); // => true
     * </pre>
     */
    public function isValid()
    {
        return $this->runValidation();
    }

    /**
     * Run all validations and returns boolean.
     * Returns true if there is errors.
     *
     */
    public function isInvalid()
    {
        return !($this->isValid());
    }

    protected function runValidation()
    {
        if (!isset($this->validations)) {
            return true;
        }

        foreach ($this->validations as $property => $value) {
            foreach ($this->validations[$property] as $validatorName => $options) {
                $klass = '\SimpleValidation\\Validators\\'.ucfirst($validatorName).'Validator';
                $validator = new $klass($this, $property, $options);
                $validator->run($this->$property);
            }
        }
        return empty($this->errors);
    }
}
