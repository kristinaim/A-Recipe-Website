<?php
require_once __DIR__."/../../src/recipe_instruction.php";

$recipe_instruction = new RecipeInstruction();
$affected = $recipe_instruction->remove();
echo $affected;
?>
