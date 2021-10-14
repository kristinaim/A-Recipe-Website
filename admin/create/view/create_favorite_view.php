<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `favorite_recipe_vw` AS 
SELECT r.recipe_id
, r.name
, r.yield
, rc.category
, f.favorite_id
, u.user_id
, u.first_name
, u.last_name
, u.email
FROM recipe r 
JOIN recipe_category rc
ON r.recipe_category_id=rc.recipe_category_id
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
