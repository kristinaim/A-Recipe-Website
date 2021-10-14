<?php
/** @deprecated */
require_once __DIR__."/../src/favorite.php";

$favorite = new Favorite();
$insert = $favorite->insert(["user_id" => 37, "recipe_id" => ]);

echo $insert;
?>
