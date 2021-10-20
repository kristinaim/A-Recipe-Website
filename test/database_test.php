<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."database.php";

$database = Database::get_instance();
$mysqli = $database->get_connection();

if ($mysqli->connect_error) {
  echo "Connection error: " . $mysqli->connect_error;
} else {
  echo "Success! Connected to " . $mysqli->host_info;
}
?>
