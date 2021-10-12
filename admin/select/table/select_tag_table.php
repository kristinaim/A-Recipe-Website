<?php
require_once __DIR__."/../../../src/tag.php";

$tag = new Tag();
$select = $tag->select();

header('Content-Type: application/json');
echo $select;
?>
