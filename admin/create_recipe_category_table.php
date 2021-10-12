<?php
$query = "CREATE TABLE IF NOT EXISTS `recipe_category` (
`recipe_category_id` int(11) NOT NULL AUTO_INCREMENT,
`category` varchar(255) NOT NULL,
PRIMARY KEY (`recipe_category_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=24;
";

echo $query;
?>