<?php
require_once __DIR__."/../../../src/recipe_instruction.php";

$recipe_instruction = new RecipeInstruction();
$select = $recipe_instruction->select();

header('Content-Type: application/json');
echo $select;
?>
