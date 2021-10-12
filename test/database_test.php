<?php
include "../src/database.php";

$database = Database::getInstance();
$mysqli = $database->getConnection();

if ($mysqli->connect_error) {
	echo "Connection error: " . $mysqli->connect_error;
} else {
	echo "Success! Connected to " . $mysqli->host_info;
}
?>
