<?php
$query = "CREATE TABLE IF NOT EXISTS `recipe_ingredient` (
`recipe_ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`ingredient_id` int(11) NOT NULL,
PRIMARY KEY (`recipe_ingredient_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=7;
";

echo $query;
?>