<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."ingredient.php";

// insert into ingredient table
$ingredient = new Ingredient();
$ingredients = '[{"name":"chocolate","amount":"4 oz"},
                 {"name":"instant coffee","amount":"1/2 tsp"},
                 {"name":"salt","amount":"1/16 tsp"},
                 {"name":"heavy cream","amount":"1 cup"},
                 {"name":"sugar","amount":"3 tbsp"},
                 {"name":"vanilla extract","amount":"1/2 tsp"}]';
$ingr_obj = json_decode($ingredients);

$insert_id = [];
foreach($ingr_obj as $row) {
  $last_id = $ingredient->insert(["name" => $row->name], "s") . "<br>";
  array_push($insert_id, $last_id);
}
echo assert(!array_sum($insert_id));
?>
