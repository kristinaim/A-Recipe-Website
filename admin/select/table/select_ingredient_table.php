<?php
require_once __DIR__."/../../../src/ingredient.php";

$ingredient = new Ingredient();
$select = $ingredient->select();

header('Content-Type: application/json');
echo $select;
?>
