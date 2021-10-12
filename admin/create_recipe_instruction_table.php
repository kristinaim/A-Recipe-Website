<?php
$query = "CREATE TABLE IF NOT EXISTS `recipe_instruction` (
`recipe_instruction_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`step` varchar(255) NOT NULL,
`step_index` int(11) NOT NULL,
PRIMARY KEY (`recipe_instruction_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=9;
";

echo $query;
?>