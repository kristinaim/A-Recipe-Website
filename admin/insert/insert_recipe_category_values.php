<?php
require_once "../../src/recipe_category.php";

$recipe_category = new RecipeCategory();
$json_str = '[{"category":"Breakfast"},
              {"category":"Lunch"},
              {"category":"Appetizer"},
              {"category":"Soup"},
              {"category":"Salad"},
              {"category":"Bread"},
              {"category":"Beef"},
              {"category":"Poultry"},
              {"category":"Pork"},
              {"category":"Seafood"},
              {"category":"Vegetarian/Vegan"},
              {"category":"Dessert"},
              {"category":"Miscellaneous"}]';

$json_obj = json_decode($json_str, true);

foreach($json_obj as $row) {
  $recipe_category->insert($row, "s") . "<br>";
}
?>
