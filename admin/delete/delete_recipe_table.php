<?php
require_once __DIR__."/../../src/recipe.php";

$recipe = new Recipe();
$affected = $recipe->remove();
echo $affected;
?>
