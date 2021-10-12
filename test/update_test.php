<?php
require_once __DIR__."/../src/entry.php";

$entry = new Entry("fake_table");
$update = $entry->update(array("id"=>0, "first"=>"Jake", "last"=>"Day"), 0);

echo $update;
?>
