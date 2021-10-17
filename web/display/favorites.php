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
$title = $_SESSION["name"]."'s Favorites - A Recipe Website";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// requirements
require_once DIR_SRC."favorite_recipe_view.php";
session_start();

// select favorites
$fav_view = new FavoriteRecipeView();
$select = $fav_view->select(["user_id" => $_SESSION["user"]], "i");
$favorites_obj = json_decode($select);

if (!$favorites_obj) {
  echo "You don't have any favorited recipes!" . "<br>";
  return; 
}

// display favorites
foreach($favorites_obj as $favorite) {
  $link = '<a href="recipe.php?id=' . $favorite->recipe_id . '" target="_blank">' . $favorite->name . '</a>';
  echo $link . "<br>";
}

// footer
require_once DIR_SRC."footer.php";
?>
