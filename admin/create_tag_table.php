<?php
$query = "CREATE TABLE IF NOT EXISTS `tag` (
`tag_id` int(11) NOT NULL AUTO_INCREMENT,
`descr` varchar(255) NOT NULL,
`descr_short` varchar(4) NOT NULL,
PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=48;
";

echo $query;
?>