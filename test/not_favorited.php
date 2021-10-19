<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."user_favorite.php";

// user id 40 has no favorites
// pot de creme id is 69
echo is_favorited($recipe_id=69, $user_id=40) ? 'true' : 'false';

// user id 37 has 1 favorite (pot de creme)
echo is_favorited($recipe_id=69, $user_id=37) ? 'true' : 'false';
?>
