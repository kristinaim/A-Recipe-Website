<?php
$query = "CREATE TABLE IF NOT EXISTS `recipe` (
`recipe_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`yield` varchar(255) DEFAULT NULL,
`recipe_category_id` int(11) NOT NULL,
PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=63;
";

echo $query;
?>