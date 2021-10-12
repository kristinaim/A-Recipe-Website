<?php
require_once __DIR__."/../src/entry.php";

$entry = new Entry("information_schema.tables");
$select = $entry->select("table_schema", "sdb_jday");

header('Content-Type: application/json');
echo $select;
?>
