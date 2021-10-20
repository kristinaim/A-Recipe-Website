<?php
require_once __DIR__."/../../root.php";
require_once DIR_SRC."recipe_instruction.php";

$recipe_instruction = new RecipeInstruction();
// update typo step
#$update = $recipe_instruction->update(["step" => "Add the eggs, sugar, vanilla, salt, and baking powder. Whisk to combine."], ["recipe_instruction_id" => 29], "si");
$update = $recipe_instruction->update(["step" => "Squeeze out any excess water with a contton cloth."], ["recipe_instruction_id" => 40], "si");
echo "Updated ".$update." row(s).";
?>
