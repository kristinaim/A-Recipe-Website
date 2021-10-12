<?php
require_once __DIR__."/../../../src/database.php";

$query = "CREATE TABLE IF NOT EXISTS `recipe_tag` (
`recipe_tag_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`tag_id` int(11) NOT NULL,
PRIMARY KEY (`recipe_tag_id`),
CONSTRAINT uc_recipe_tag UNIQUE (`recipe_id`, `tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=48;
";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `recipe_tag` created successfully.";
} else {
  echo "Error creating table `recipe_tag`: " . $mysqli->error;
}
?>
