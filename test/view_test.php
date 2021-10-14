<?php
require_once __DIR__."/../src/favorite_recipe_view.php";

$view = new FavoriteRecipeView();
$select = $view->select();

header('Content-Type: application/json');
echo $select;
?>
