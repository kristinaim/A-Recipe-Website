<?php
require_once(DIR_SRC."favorite_recipe_view.php");
session_start();

// verify user is logged in
if (!$_SESSION["login"]) {
  header("Location: ".LINK_WEB."login.php");
}

$fav_view = new FavoriteRecipeView();
$select = $fav_view->select(["user_id" => $_SESSION["user"]], "i");
$favorites_obj = json_decode($select);
if (!$favorites_obj) {
  echo "You don't have any favorited recipes!" . "<br>";
  return; 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include(__DIR__."/../../src/head.html"); ?>
    <title><?=$_SESSION["name"]?>'s Favorites - A Recipe Website</title>
  </head>
  <body>
    <?php
    foreach($favorites_obj as $favorite) {
      $link = '<a href="recipe.php?id=' . $favorite->recipe_id . '" target="_blank">' . $favorite->name . '</a>';
      echo $link . "<br>";
    }
    ?>
  </body>
</html>
