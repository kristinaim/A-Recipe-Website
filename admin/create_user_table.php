<?php
$query = "CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL AUTO_INCREMENT,
`first_name` varchar(255) DEFAULT NULL,
`last_name` varchar(255) DEFAULT NULL,
`email` varchar(255) NOT NULL,
`password_hash` varchar(255) NOT NULL,
PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFALT CHARSET=latin1 AUTO_INCREMENT=37;
";

echo $query;
?>