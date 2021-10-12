<?php
require_once "user.php";

function create_user($email, $first_name, $last_name, $password) {
  $user = new User();
  $exists = $user->select(["email" => $email]);
  $json_arr = json_decode($exists, true);
  
  if (count($json_arr) > 0) {
    echo "User already exists with email " . $email . "<br>";
    return false;
  }
  
  $json_obj = [
    "email" => $email,
    "first_name" => $first_name,
    "last_name" => $last_name,
    "password_hash" => password_hash($password, PASSWORD_BCRYPT)
  ];
  
  $json_obj = json_encode($json_obj, JSON_PRETTY_PRINT);
  $add_user = $user->insert($json_obj);
  
  if ($add_user) {
    echo "User has been added." . "<br>";
  } else {
    echo "Failed to add user." . "<br>";
    // TODO: why?
    return false;
  }
  
  return true;
}

function login($email, $password) {
  $user = new User();
  $exists = $user->select(["email" => $email]);
  $json_arr = json_decode($exists, true);
  
  return isset($json_arr[0] && password_verify($password, $json_arr[0]->password_hash);
}
?>
