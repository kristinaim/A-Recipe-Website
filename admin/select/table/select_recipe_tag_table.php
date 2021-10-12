<?php
require_once __DIR__."/../../../src/recipe_tag.php";

$recipe_tag = new RecipeTag();
$select = $recipe_tag->select();

header('Content-Type: application/json');
echo $select;
?>
