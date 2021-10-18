<?php
// constants
require_once __DIR__."/../../root.php";

// requirements
require_once DIR_SRC."recipe_view.php";
require_once DIR_SRC."recipe_ingredient_view.php";
require_once DIR_SRC."recipe_instruction_view.php";
session_start();

// verify user is logged in
if (!isset($_SESSION["login"])) {
  header("Location: ".LINK_WEB."login.php");
}

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
$title = $recipe_obj->name." - A Recipe Website";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// display recipe
$recipe_vw->display($recipe_obj->recipe_id);

// footer
require_once DIR_SRC."footer.php";
?>
