<?php
$query = "CREATE TABLE IF NOT EXISTS `favorite` (
`recipe_tag_id` int(11) NOT NULL AUTO_INCREMENT,
`recipe_id` int(11) NOT NULL,
`tag_id` int(11) NOT NULL,
PRIMARY KEY (`recipe_tag_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=48;
";

echo $query;
?>