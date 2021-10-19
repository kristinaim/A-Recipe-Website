<?php
require_once __DIR__."/../../root.php";
require_once DIR_SRC."ingredient.php";

$ingredient = new Ingredient();
// update Cucumber
$update = $ingredient->update(["name" => "Cucumber"], ["ingredient_id" => 109], "si");
echo "Updated ".$update." row(s).";
?>
