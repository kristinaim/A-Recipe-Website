<?php
require_once "../src/entry.php";

$entry = new Entry("tag");
$select = $entry->select();

header('Content-Type: application/json');
echo $select;
?>
