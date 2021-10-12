<?php
$query = "CREATE TABLE IF NOT EXISTS `favorite` (
`favorite_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`favorite_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=19;
";

echo $query;
?>