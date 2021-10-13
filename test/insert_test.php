<?php
/** @deprecated */
require_once __DIR__."/../src/entry.php";

$entry = new Entry("fake_table");
$insert = $entry->insert(["id" => 0, "first" => "Jake", "last" => "Day"]);

echo $insert;
?>
