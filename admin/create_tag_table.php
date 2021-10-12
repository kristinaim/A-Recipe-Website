<?php
require_once "../src/database.php";

$query = "CREATE TABLE IF NOT EXISTS `tag` (
`tag_id` int(11) NOT NULL AUTO_INCREMENT,
`descr` varchar(255) NOT NULL,
`descr_short` varchar(4) NOT NULL,
PRIMARY KEY (`tag_id`),
CONSTRAINT uc_descr UNIQUE (`descr`, `descr_short`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=48;
";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `tag` created successfully.";
} else {
  echo "Error creating table `tag`: " . $mysqli->error;
}
?>