<?php
require_once __DIR__."/../../../src/favorite.php";

$favorite = new Favorite();
$select = $favorite->select();

header('Content-Type: application/json');
echo $select;
?>
