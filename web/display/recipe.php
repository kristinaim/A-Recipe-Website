<?php
// constants
require_once __DIR__."/../root.php";

// verify user is logged in
if (!isset($_SESSION["login"])) {
  header("Location: ".LINK_WEB."login.php");
}

// requirements
require_once DIR_SRC."recipe_view.php";
require_once DIR_SRC."recipe_ingredient_view.php";
require_once DIR_SRC."recipe_instruction_view.php";
session_start();

// get recipe and category
$recipe_vw = new RecipeView();
$select = $recipe_vw->select(["recipe_id" => $_GET["id"]], "i");

// check for non-existent recipe
if (!$select) {
  // TODO: create page for error redirect
  echo "Invalid recipe ID!" . "<br>";
  return;
}

$recipe_obj = json_decode($select)[0];

// header
ob_start();
require_once DIR_SRC."header.php";
$buffer = ob_get_contents();
ob_end_clean();
$title = $recipe_obj->name."'s Favorites - A Recipe Website";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// get recipe ingredients
$recipe_ingr_vw = new RecipeIngredientView();
$select = $recipe_ingr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_ingr_obj = json_decode($select);

// get recipe instructions
$recipe_instr_vw = new RecipeInstructionView();
$select = $recipe_instr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_instr_obj = json_decode($select);

// display recipe information
echo "Name: " . $recipe_obj->name . "<br>";
echo "Serving Size: " . $recipe_obj->serving_size . "<br>";
echo "Category: " . $recipe_obj->category . "<br>";

echo "Ingredients:" . "<br>";
foreach($recipe_ingr_obj as $ingr) {
  echo "- " . $ingr->amount . " " . $ingr->ingredient . "<br>";
}

echo "Instructions:" . "<br>";
foreach($recipe_instr_obj as $instr) {
  echo $instr->step_index+1 . "). " . $instr->step . "<br>";
}

// footer
require_once DIR_SRC."footer.php";
?>
