<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE TABLE IF NOT EXISTS `recipe_category` (
`recipe_category_id` int(11) NOT NULL AUTO_INCREMENT,
`category` varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (`recipe_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24;
";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `recipe_category` created successfully.";
} else {
  echo "Error creating table `recipe_category`: " . $mysqli->error;
}
?>
