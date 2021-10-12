<?php
require_once __DIR__."/../../../src/recipe_ingredient.php";

$recipe_ingredient = new RecipeIngredient();
$select = $recipe_ingredient->select();

header('Content-Type: application/json');
echo $select;
?>
