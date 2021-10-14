<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include(__DIR__."/../../src/head.html"); ?>
		<title>Login</title>
	</head>
	<body>
    <?php
    require_once(__DIR__."/../../src/favorite_recipe_view.php");
    session_start();
    
    // verify user is logged in
    if (!$_SESSION["login"]) {
      header("Location: " . "../web/login.php");
    }
    
    $fav_view = new FavoriteRecipeView();
    $select = $fav_view->select(["user_id" => $_SESSION["user"]], "i");
    $favorites_obj = json_decode($select);
    
    foreach($favorites_obj as $favorite) {
      $link = '<a href="recipe.php?id=' . $favorite->recipe_id . '" target="_blank">' . $favorite->name . '</a>';
      echo $link . "<br>";
    }
    ?>
	</body>
</html>
