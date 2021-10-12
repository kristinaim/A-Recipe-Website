<?php
require_once "../src/tag.php";

$tag = new Tag();
$json_str = '[{"descr":"Meal Prep Friendly","descr_short":"MPF"},
              {"descr":"Quick and Easy","descr_short":"Q&E"},
              {"descr":"Health","descr_short":"H"},
              {"descr":"Keto","descr_short":"K"},
              {"descr":"Pescetarian","descr_short":"P",
              {"descr":"Vegetarian","descr_short":"V",
              {"descr":"Vegan","descr_short","VE"}]';

$json_obj = json_decode($json_str, true);

foreach($json_obj as $row) {
  echo $tag->insert($row);
  /*
  foreach($row as $key => $value) {
    echo $key . " => " . $value . "<br>";
  }*/
}

?>