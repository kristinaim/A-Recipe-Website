<?php
require_once __DIR__."/../src/favorite.php";
require_once __DIR__."/../src/user.php";
require_once __DIR__."/../src/recipe.php";

// get user
$user = new User();
$select = $user->select(["email" => "gsnail@scu.edu"], "s");
$gary = json_decode($select)[0];

// get recipe
$recipe = new Recipe();
$select = $recipe->select(["name" => "Pot de Crème"], "s");
$pot_de_creme = json_decode($select)[0];

// insert into favorite table
$favorite = new Favorite();
$favorite_id = $favorite->insert(["recipe_id" => $pot_de_creme->recipe_id, "user_id" => $gary->user_id], "ii");
echo $favorite_id;
?>
