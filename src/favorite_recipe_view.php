<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."recipe_view.php";

class FavoriteRecipeView extends RecipeView {
  public function __construct() {
    parent::__construct("favorite_recipe_vw");
  }
}
?>
