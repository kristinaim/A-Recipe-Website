<?php
require_once __DIR__."/../../src/database.php";

//$query = "ALTER TABLE `recipe` MODIFY `recipe_category_id` int(11)";
//$query = "ALTER TABLE `recipe` DROP COLUMN `yield`";
$query = "ALTER TABLE `recipe` ADD COLUMN `serving_size` int(11)";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `recipe` altered successfully.";
} else {
  echo "Error alteringg table `recipe`: " . $mysqli->error;
}
?>
