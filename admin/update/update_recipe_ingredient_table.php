<?php
require_once __DIR__."/../../root.php";
require_once DIR_SRC."recipe_ingredient.php";

$recipe_ingredient = new RecipeIngredient();
// update Cucumber
$update = $recipe_ingredient->update(["amount" => "1"], ["recipe_ingredient_id" => 47], "si");
echo "Updated ".$update." row(s).";
?>
