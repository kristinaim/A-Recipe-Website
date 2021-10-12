<?php
require_once __DIR__."/../../../src/recipe_category.php";

$recipe_category = new RecipeCategory();
$select = $recipe_category->select();

header('Content-Type: application/json');
echo $select;
?>
