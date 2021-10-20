<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."favorite_recipe_view.php";

$view = new FavoriteRecipeView();
$select = $view->select(["email" => "gsnail@scu.edu"], "s");

header('Content-Type: application/json');
echo $select;
?>
