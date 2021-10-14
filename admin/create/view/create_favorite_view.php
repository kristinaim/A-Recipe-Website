<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `favorite_recipe_vw` AS 
SELECT r.name 
FROM recipe r 
JOIN favorite f 
ON r.recipe_id=f.recipe_id 
JOIN user u 
ON u.user_id=f.user_id 
ORDER BY r.name";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "View `favorite_recipe_vw` created successfully.";
} else {
  echo "Error creating view `favorite_recipe_vw`: " . $mysqli->error;
}
?>
