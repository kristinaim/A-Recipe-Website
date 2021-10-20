<?php
require_once __DIR__."/../../src/ingredient.php";

$ingredient = new Ingredient();
$affected = $ingredient->remove();
echo $affected;
?>
