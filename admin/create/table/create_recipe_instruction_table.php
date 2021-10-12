<?php
require_once "../../../src/database.php";

$query = "CREATE TABLE IF NOT EXISTS `recipe_instruction` (
`recipe_instruction_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`step` varchar(255) NOT NULL,
`step_index` int(11) NOT NULL,
PRIMARY KEY (`recipe_instruction_id`),
CONSTRAINT uc_recipe_step_index UNIQUE (`recipe_id`, `step_index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;
";

$db = Database::get_instance();
$mysqli = $db->get_connection();

if ($mysqli->query($query)) {
  echo "Table `recipe_instruction` created successfully.";
} else {
  echo "Error creating table `recipe_instruction`: " . $mysqli->error;
}
?>