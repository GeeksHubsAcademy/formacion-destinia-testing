<?php

class PasswordValidator {
  private $password;
  private $errors = [];

  public function __construct($password)
  {
    $this->password = $password;
  }

  public function validate()
  {
    $this->validateLength();
    $this->validateSpecialChars();
    $this->validateNumbers();
    $this->validateUpperCase();
    $this->validateLowerCase();
    $this->validateSpaces();

    return $this->errors;
  }

  private function validateLength()
  {
    if (strlen($this->password) <= 8) {
      $this->errors[] = 'Must have more than 8 chars';
    }
  }

  private function validateSpecialChars()
  {
    if (!preg_match('/[\'^£$%&*(?¿¡!)}{@#~?><>,|=_+¬-]/', $this->password)) {
      $this->errors[] = 'Must have at least one especial character';
    }
  }

  private function validateNumbers()
  {
    if (!preg_match('/[0-9]/', $this->password)) {
      $this->errors[] = 'Must have at least one number';
    }
  }

  private function validateUpperCase()
  {
    if (!preg_match('/[A-Z]/', $this->password)) {
      $this->errors[] = 'Must have at least one uppercase';
    }
  }

  private function validateLowerCase()
  {
    if (!preg_match('/[a-z]/', $this->password)) {
      $this->errors[] = 'Must have at least one lowercase';
    }
  }

  private function validateSpaces()
  {
    if (preg_match('/\s/', $this->password)) {
      $this->errors[] = 'Must can not have any space';
    }
  }
}


class Password
{
  private $password;
  private $errors = [];
  private $validatorClass;

  public $posibleErrors = [
    'errorLength' => 'Must have more than 8 chars',
    'errorSpecialChars' => 'Must have at least one especial character',
    'errorNumbers' => 'Must have at least one number',
    'erroUpperCase' => 'Must have at least one uppercase',
    'errorLowerCase' => 'Must have at least one lowercase',
    'errorSpaces' => 'Must can not have any space',
  ];

  public function __construct($value, $validatorClass = PasswordValidator::class)
  {
    $this->validatorClass = $validatorClass;

    $this->password = $value;
    $this->validate();
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function isValid()
  {
    return count($this->errors) === 0;
  }
  private function validate()
  {
    $validator = new $this->validatorClass($this->password);
    $this->errors = $validator->validate();



  }
  public function getErrors()
  {
    return $this->errors;
  }
}
