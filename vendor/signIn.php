<?php
session_start();
require_once 'CRUD.php';

$data_json = json_encode($_POST, JSON_UNESCAPED_UNICODE);
$data = json_decode($data_json, true);

$login = $data["login"];
$password = $data["password"];

$pathSJON = "bd.json";
$crud = new CRUD($pathSJON);
$user = $crud->readRecords("login", $login);

if ($user) {
  if ($user["password"] === $password) {
    $response = [
      "status" => true,
      "message" => "Hello $login",
    ];
    setcookie("user",$login, time() + 3600, "/");
    die(json_encode($response));
  }
  $response = [
    "status" => false,
    "message" => "pass"
  ];
  die(json_encode($response));
}
$response = [
  "status" => false,
  "message" => "logo"
];
die(json_encode($response));
