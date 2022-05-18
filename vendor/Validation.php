<?php

class Validation
{

  public function checkLongLogin($login, int $length)
  {
    if (strlen($login) < $length) {
      $response = [
        "status" => false,
        "field" => "login",
        "message" => "Your Login length less than 6!"
      ];
      die(json_encode($response));
    }
  }

  public function checkWhiteSpaceLogin($login)
  {
    if (preg_match("#[\s]#", $login)) { //проверка пробела в login
      $response = [
        "status" => false,
        "field" => "login",
        "message" => "Your Login must not contain white spaces!"
      ];
      die(json_encode($response));
    }
  }

  public function checkExistLogin($login)
  {
    if ($login) {
      $response = [
        "status" => false,
        "field" => "login",
        "message" => "This Login already exists!"
      ];
      die(json_encode($response));
    }
  }

  public function checkLongPassword($password, int $length)
  {
    if (strlen($password) < $length) { //проверка длины password
      $response = [
        "status" => false,
        "field" => "password",
        "message" => "Your Password length less than 6!"
      ];
      die(json_encode($response));
    }
  }

  public function checkNumbPassword($password)
  {
    if (!preg_match("#[0-9]#", $password)) { //проверка содержания цифры в пароле
      $response = [
        "status" => false,
        "field" => "password",
        "message" => "Your Password must contain At Least 1 Number!"
      ];
      die(json_encode($response));
    }
  }

  public function checkLetterPassword($password)
  {
    if (!preg_match("#[A-Za-z]#", $password)) { //проверка содержания буквы в пароле
      $response = [
        "status" => false,
        "field" => "password",
        "message" => "Your Password must contain At Least 1 letter!"
      ];
      die(json_encode($response));
    }
  }
  public function checkWhiteSpacePassword($password)
  {
    if (preg_match("#[\s]#", $password)) { //проверка пробела в pass
      $response = [
        "status" => false,
        "field" => "login",
        "message" => "Your Password must not contain white spaces!"
      ];
      die(json_encode($response));
    }
  }

  public function checkConfirmPassword($password, $confirm_password)
  {
    if ($password != $confirm_password) { //проверка одинакового пароля
      $response = [
        "status" => false,
        "field" => "confirm_password",
        "message" => "Your Password does not match confirm_password!"
      ];
      die(json_encode($response));
    }
  }

  public function checkCorrectEmail($email)
  {
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = [
        "status" => false,
        "field" => "email",
        "message" => "Your email address is incorrect!"
      ];
      die(json_encode($response));
    }
  }

  public function checkExistEmail($email)
  {
    if ($email) {
      $response = [
        "status" => false,
        "field" => "email",
        "message" => "This email already exists!"
      ];
      die(json_encode($response));
    }
  }

  public function checkLetterName($name,int $length)
  {
    if (!ctype_alpha($name) || strlen($name)<$length 
    ){
      $response = [
        "status" => false,
        "field" => "name",
        "message" => "Your Name must contain at least". $length . " letter!"
      ];
      die(json_encode($response));
    }
  }
}
