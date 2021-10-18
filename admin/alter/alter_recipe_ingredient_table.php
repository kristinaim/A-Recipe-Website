<?php
require_once __DIR__."/../../src/database.php";

$query = "ALTER TABLE `recipe_ingredient` MODIFY COLUMN `amount` varchar(255) DEFAULT NULL";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `recipe_ingredient` altered successfully.";
} else {
  echo "Error altering table `recipe_ingredient`: " . $mysqli->error;
}
?>
