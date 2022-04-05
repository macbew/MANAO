<?php
session_start();
require_once 'CRUD.php';
require_once 'Validation.php';

$pathSJON = "bd.json";
$crud = new CRUD($pathSJON);
$checklog = $crud->readRecords("login", $request["login"]); 
$checkEmail = $crud->readRecords("email", $request["email"]); 


$data_json = json_encode($_POST, JSON_UNESCAPED_UNICODE);
$data = json_decode($data_json, true);

$request = [
  "login" => filter_var(trim($data['login'])),
  "password" => $data['password'],
  "confirm_password" => $data['confirm_password'],
  "email" => $data['email'],
  "name" => $data['name']
];

$checker = new Validation();
$checker->checkLongLogin($request["login"], 6);
$checker->checkWhiteSpaceLogin($request["login"]);
$checker->checkExistLogin($checklog);
$checker->checkLongPassword($request["password"], 6);
$checker->checkNumbPassword($request["password"]);
$checker->checkLetterPassword($request["password"]);
$checker->checkWhiteSpacePassword($request["password"]);
$checker->checkConfirmPassword($request["password"], $request["confirm_password"]);
$checker->checkCorrectEmail($request["email"]);
$checker->checkExistEmail($checkEmail);
$checker->checkLetterName($request["name"], 2);

$request["password"] = md5('solt' . $request["password"]);
$crud->createRecord($request);
setcookie("user", $request["login"], time() + 3600, "/");

$response = [
  "status" => true
];
die(json_encode($response));
