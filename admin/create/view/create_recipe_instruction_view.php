<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE VIEW `recipe_instruction_vw` AS 
SELECT r.recipe_id
, r.name AS `recipe`
, rin.step
, rin.step_index
FROM recipe r 
JOIN recipe_instruction rin
ON r.recipe_id=rin.recipe_id
ORDER BY r.name, rin.step_index";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "View `recipe_instruction_vw` created successfully.";
} else {
  echo "Error creating view `recipe_instruction_vw`: " . $mysqli->error;
}
?>
