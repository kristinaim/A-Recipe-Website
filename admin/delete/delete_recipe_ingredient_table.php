<?php
require_once __DIR__."/../../src/recipe_ingredient.php";

$recipe_ingredient = new RecipeIngredient();
$affected = $recipe_ingredient->remove();
echo $affected;
?>
