<?php
require_once __DIR__."/../src/entry.php";

$entry = new Entry("tag");
$select = $entry->select();

header('Content-Type: application/json');
echo $select;
?>
