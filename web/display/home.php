<?php
// constants
require_once __DIR__."/../root.php";

// verify user is logged in
if (!isset($_SESSION["login"])) {
  header("Location: ".LINK_WEB."login.php");
}

// header
ob_start();
require_once DIR_SRC."header.php";
$buffer = ob_get_contents();
ob_end_clean();
$title = "Home - A Recipe Website";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// requirements
require_once DIR_SRC."recipe_view.php";
require_once DIR_SRC."recipe_ingredient_view.php";
require_once DIR_SRC."recipe_instruction_view.php";
session_start();

// get all recipes
$recipe_vw = new RecipeView();
$select = $recipe_vw->select();
$recipe_obj = json_decode($select);

// get random recipe
$recipe_rand = array_rand(json_decode($select), 1);
$recipe_obj = $recipe_obj[$recipe_rand];
  
// get recipe ingredients
$recipe_ingr_vw = new RecipeIngredientView();
$select = $recipe_ingr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_ingr_obj = json_decode($select);

// get recipe instructions
$recipe_instr_vw = new RecipeInstructionView();
$select = $recipe_instr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_instr_obj = json_decode($select);

// display recipe
echo "Recipe ID: " . $recipe_obj->recipe_id . "<br>";
echo "Name: " . $recipe_obj->name . "<br>";
echo "Serving Size: " . $recipe_obj->serving_size . "<br>";
echo "Category: " . $recipe_obj->category . "<br>";

echo "Ingredients:" . "<br>";
foreach($recipe_ingr_obj as $ingr) {
  echo "- " . $ingr->amount . " " . $ingr->ingredient . "<br>";
}

echo "Instructions:" . "<br>";
foreach($recipe_instr_obj as $instr) {
  echo $instr->step_index+1 . ") " . $instr->step . "<br>";
}

// footer
require_once DIR_SRC."footer.php";
?>
