<?php
require_once "../src/tag.php";

$tag = new Tag();
$json_str = '[{"descr":"Meal Prep Friendly","descr_short":"MPF"},
              {"descr":"Quick and Easy","descr_short":"Q&E"}]';

/*      
$params = array(array("descr"=>"Meal Prep Friendly",
                      "descr_short"=>"MPF"),
                array("descr"=>"Quick and Easy",
                      "descr_short"=>"Q&E"),
                array("descr"=>"Healthy",
                      "descr_short"=>"H"),
                array("descr"=>"Keto",
                      "descr_short"=>"K"),
                array("descr"=>"Pescetarian",
                      "descr_short"=>"P"),
                array(*/
$json_obj = json_decode($json_str, true);

foreach($json_obj as $key => $value) {
  echo $key . " => " . $value . "<br>";
}

?>