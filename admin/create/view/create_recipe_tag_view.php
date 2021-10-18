<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `recipe_tag_vw` AS 
SELECT r.recipe_id
, r.name
, t.descr
, t.descr_short
FROM recipe r 
JOIN recipe_tag rt
ON r.recipe_id=rt.recipe_id
JOIN tag t
ON t.tag_id=rt.tag_id
ORDER BY r.name, t.descr";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "View `recipe_tag_vw` created successfully.";
} else {
  echo "Error creating view `recipe_tag_vw`: " . $mysqli->error;
}
?>
