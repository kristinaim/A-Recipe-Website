<?php
/** @deprecated */
require_once __DIR__."/../root.php";
require_once DIR_SRC."entry.php";

$entry = new Entry("fake_table");
$update = $entry->update(["id" => 0, "first" => "Jake", "last" => "Day"], 0);

echo $update;
?>
