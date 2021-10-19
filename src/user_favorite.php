<?php
// constants
require_once __DIR__."/../root.php";

// requirements
require_once DIR_SRC."favorite.php";
require_once DIR_SRC."favorite_recipe_view.php";
session_start();
// verify user is logged in
/*
if (!isset($_SESSION["login"])) {
  header("Location: ".LINK_WEB."login.php");
}
 */
// check if the displayed recipe is favorited
function is_favorited($recipe_id, $user_id) {
  $params = ["recipe_id" => $recipe_id,
             "user_id" => $user_id];
  $favorite_recipe_view = new FavoriteRecipeView();
  $select = $favorite_recipe_view->select($params, "ii");
  return !empty($select);
}

if (isset($_POST["function"])) {
  switch ($_POST["function"]) {
    case "is_favorite":
      echo is_favorited($_POST["recipe_id"], $_SESSION["user"]);
      break;
    default:
      echo 0;
  }
}
?>
