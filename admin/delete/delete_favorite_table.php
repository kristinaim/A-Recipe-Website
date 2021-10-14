<?php
require_once __DIR__."/../../src/favorite.php";

$favorite = new Favorite();
$affected = $favorite->remove();
echo $affected;
?>
