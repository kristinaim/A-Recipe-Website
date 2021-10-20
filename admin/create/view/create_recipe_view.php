<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `recipe_vw` AS 
SELECT r.recipe_id
, r.name
, r.serving_size
, rc.category
FROM recipe r 
JOIN recipe_category rc
ON r.recipe_category_id=rc.recipe_category_id
ORDER BY rc.category, r.name";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "View `recipe_vw` created successfully.";
} else {
  echo "Error creating view `recipe_vw`: " . $mysqli->error;
}
?>
