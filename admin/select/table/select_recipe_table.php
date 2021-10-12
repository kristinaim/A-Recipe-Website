<?php
require_once __DIR__."/../../../src/recipe.php";

$recipe = new Recipe();
$select = $recipe->select();

header('Content-Type: application/json');
echo $select;
?>
