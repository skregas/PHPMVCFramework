<?php

namespace app\core;
/**
 * Summary of Model
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/core/Model.php
 * @copyright (c) 2023
 */
abstract class Model{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    // public const RULE_MAX = 'max';
    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    /**
     * Must be overidden by child class. Returns set of validation rules as array
     * @return array
     * @author skregas
     */
    abstract public function rules(): array;

    public $errors = [];
    /**
     * Add error to $errors array to pass to the view for display
     * @param mixed $attribute
     * @param mixed $rule
     * @return void
     * @author skregas
     */
    public function addError(string $attribute, string $rule, $params = []): void
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    /**
     * Must be overridden by child class. Return the error message associated with the given rule
     * @param mixed $rule
     * @return void
     * @author skregas
     */
    abstract function errorMessages(): array;


    /**
     * Validate data passed via registration form, according to set of rules defined in RegisterModel
     * @return bool
     * @author skregas
     */
    public function validate(): bool
    {   
        // $is_valid = true;
        foreach ($this->rules() as $attribute => $rules) {
            // atrributes are: f_name, l_name, etc
            $value = $this->{$attribute};
            // each attribute has one or more rules associated with it
            echo 'Attribute: '. $attribute .'  Value: '. $value .' ';
            foreach ($rules as $rule) {
                $ruleName = $rule;
                echo 'Rule name: ' . $ruleName . '<br>';
                // at this point, each rule is either a string, or a sub-array
                if (!is_string($ruleName)) {
                    // if the rule name is an array
                    // the first element is the name/attribute the rule applies to.
                    $ruleName = $rule[0];
                    echo 'Rule name: ' . $ruleName. '<br>';
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                    // $is_valid = false;
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            }
        }
        return empty($this->errors);
    }

    
}

?>