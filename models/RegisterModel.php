<?php 

namespace app\models;
use app\core\Model;

/**
 * Summary of RegisterModel
 * 
 * Handles data posted from registration form
 * @author skregas <skregas01@gmail.com>
 * @package htdocs/PHPMVCFramework/models/RegisterModel.php
 * @copyright (c) 2023
 */
class RegisterModel extends Model {

    public $f_name;
    public $l_name;
    public $email;
    public $password;
    public $passwd_confirm;

    public function register(): bool
    {
        echo "Creating new user account...";
        return false;

    }

    public function rules(): array
    {
        return [
            'f_name' => [self::RULE_REQUIRED],
            'l_name'=> [self::RULE_REQUIRED],
            'email'=> [self::RULE_EMAIL, self::RULE_REQUIRED],
            'password'=> [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwd_confirm'=> [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => "This field is required",
            self::RULE_EMAIL => "This field must contain a valid email address",
            self::RULE_MIN => "Minimum length of this field must be {min} characters",
            self::RULE_MAX => "Maximum length of this field must be {max} characters",
            self::RULE_MATCH => "This field must match the {match} field",
        ];
    }
}

?>