<?php
$query = "CREATE TABLE IF NOT EXISTS `ingredient` (
`ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=18;
";

echo $query;
?>