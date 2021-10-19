<?php
// constants
require_once __DIR__."/../root.php";

// requirements
require_once DIR_SRC."favorite.php";
require_once DIR_SRC."favorite_recipe_view.php";
session_start();

// check if the displayed recipe is favorited
function is_favorited($recipe_id, $user_id) {
  $params = ["recipe_id" => $recipe_id,
             "user_id" => $user_id];
  $favorite_recipe_view = new FavoriteRecipeView();
  $select = $favorite_recipe_view->select($params, "ii");
  return !empty($select);
}

// favorite or unfavorite a recioe
function set_favorite($recipe_id, $user_id, $is_favorite) {
  $params = ["recipe_id" => $recipe_id,
             "user_id" => $user_id];
  $favorite = new Favorite();

  // insert or delete
  if ($is_favorite) {
    $favorite->insert($params, "ii");
  } else {
    $favorite->remove($params, "ii");
  }
}

if (isset($_POST["function"])) {
  switch ($_POST["function"]) {
    case "is_favorite":
      echo is_favorited($_POST["recipe_id"], $_SESSION["user"]);
      break;
    case "set_favorite":
      set_favorite($_POST["recipe_id"], $_SESSION["user"], $_POST["fav"]);
      break;
    default:
      echo 0;
  }
}
?>
