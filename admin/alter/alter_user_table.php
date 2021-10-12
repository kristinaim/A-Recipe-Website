<?php
require_once __DIR__."/../../../src/database.php";

$query = "ALTER TABLE `user` MODIFY `password_hash` char(60);";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `user` altered successfully.";
} else {
  echo "Error altering table `user`: " . $mysqli->error;
}
?>
