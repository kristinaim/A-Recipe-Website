<?php
require_once __DIR__."/../../../src/user.php";

$user = new User();
$select = $user->select();

header('Content-Type: application/json');
echo $select;
?>
