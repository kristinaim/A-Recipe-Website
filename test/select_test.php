<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."entry.php";

$entry = new Entry("tag");
$select = $entry->select();

header('Content-Type: application/json');
echo $select;
?>
