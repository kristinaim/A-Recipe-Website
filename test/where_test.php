<?php
require_once "../src/entry.php";

$entry = new Entry("tag");
$select = $entry->select(array("descr"=>"Keto","descr_short"=>"K"), "ss");

header('Content-Type: application/json');
echo $select;
?>
