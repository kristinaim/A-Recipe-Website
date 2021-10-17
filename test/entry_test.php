<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."entry.php";

$entry = new Entry("information_schema.tables");
$select = $entry->select(["table_schema" => "sdb_jday"], "s");

header('Content-Type: application/json');
echo $select;
?>
