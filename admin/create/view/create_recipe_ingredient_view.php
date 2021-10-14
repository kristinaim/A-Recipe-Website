<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `recipe_ingredient_vw` AS 
SELECT r.recipe_id
, r.name AS `recipe`
, i.name AS `ingredient`
, rig.amount
FROM recipe r 
JOIN recipe_ingredient rig
ON r.recipe_id=rig.recipe_id
JOIN ingredient i
ON i.ingredient_id=rig.ingredient_id
ORDER BY r.name";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "View `recipe_ingredient_vw` created successfully.";
} else {
  echo "Error creating view `recipe_ingredient_vw`: " . $mysqli->error;
}
?>
