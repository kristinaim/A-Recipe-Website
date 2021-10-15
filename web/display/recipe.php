<?php
require_once(__DIR__."/../../src/reciep_view.php");
require_once(__DIR__."/../../src/recipe_ingredient_view.php");
require_once(__DIR__."/../../src/recipe_instruction_view.php");
session_start();

// verify user is logged in
if (!$_SESSION["login"]) {
  header("Location: " . "../web/login.php");
}

// get recipe and category
$recipe_vw = new RecipeView();
$select = $recipe_vw->select(["recipe_id" => $_GET["id"]], "i");
$recipe_obj = json_decode($select)[0];

// get recipe ingredients
$recipe_ingr_vw = new RecipeIngredientView();
$select = $recipe_ingr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_ingr_obj = json_decode($select);

// get recipe instructions
$recipe_instr_vw = new RecipeInstructionView();
$select = $recipe_instr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
$recipe_instr_obj = json_decode($select);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include(__DIR__."/../../src/head.html"); ?>
		<title><?= $recipe_obj->name?> - A Recipe Website</title>
	</head>
	<body>
    <?php
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
      echo $instr->step_index+1 . "). " . $instr->step . "<br>";
    }
    ?>
	</body>
</html>
