<?php

class UserBisBis {
  private $email;
  private $firstName;
  private $lastName;
  private $password;
  private $birthday;

  public function __construct($email, $firstName, $lastName, $password, $birthday) {
      $this->email = $email;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->password = $password;
      $this->birthday = $birthday;
  }

  public function isValid() {
      $validEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL);
      $validName = !empty($this->firstName) && !empty($this->lastName);
      $validPassword = preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,40}$/', $this->password);
      $validBirthday = strtotime($this->birthday) <= strtotime('-13 years');
      return $validEmail && $validName && $validPassword && $validBirthday;
  }
}

?>
