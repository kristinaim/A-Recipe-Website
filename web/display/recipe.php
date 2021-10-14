<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include(__DIR__."/../../src/head.html"); ?>
		<title>Login</title>
	</head>
	<body>
    <?php
    require_once(__DIR__."/../../src/recipe.php");
    require_once(__DIR__."/../../src/recipe_category.php");
    require_once(__DIR__."/../../src/recipe_ingredient_view.php");
    session_start();
    
    // verify user is logged in
    if (!$_SESSION["login"]) {
      header("Location: " . "../web/login.php");
    }
    
    $recipe = new Recipe();
    $select = $recipe->select(["recipe_id" => $_GET["id"]], "i");
    $recipe_obj = json_decode($select)[0];
    
    $recipe_cat = new RecipeCategory();
    $select = $recipe_cat->select(["recipe_category_id" => $recipe_obj->recipe_category_id], "i");
    $recipe_cat_obj = json_decode($select)[0];
    
    $recipe_ingr_vw = new RecipeIngredientView();
    $select = $recipe_ingr_vw->select(["recipe_id" => $recipe_obj->recipe_id], "i");
    $recipe_ingr_obj = json_decode($select);
    
    echo "Recipe ID: " . $recipe_obj->recipe_id . "<br>";
    echo "Name: " . $recipe_obj->name . "<br>";
    echo "Serving Size: " . $recipe_obj->serving_size . "<br>";
    echo "Category: " . $recipe_cat_obj->category . "<br>";
    
    foreach($recipe_ingr_obj as $ingr) {
      echo "Ingredient: " . $ingr->ingredient . ", Amount: " . $ingr->amount . "<br>";
    }
    ?>
	</body>
</html>
