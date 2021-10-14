<?php
require_once __DIR__."/../src/recipe_category.php";
require_once __DIR__."/../src/recipe.php";
require_once __DIR__."/../src/ingredient.php";
require_once __DIR__."/../src/recipe_ingredient.php";

// get dessert category id
$recipe_category = new RecipeCategory();
$dessert = $recipe_category->select(["category" => "Dessert"], "s");
$dessert = json_decode($dessert)[0];
$dessert->recipe_category_id;

// insert into recipe table
$recipe = new Recipe();
$recipe_str = '{"name":"Pot de Crème","yield":4,"recipe_category_id":' . $dessert->recipe_category_id . '}';
$recipe_arr = json_decode($recipe_str, true);
$recipe_id = $recipe->insert($recipe_arr, "ssi");

// insert into ingredient table
$ingredient = new Ingredient();
$recipe_ingredient = new RecipeIngredient();

$ingredients = '[{"name":"Chocolate","amount":"4 oz"},
                 {"name":"Instant coffee","amount":"1/2 tsp"},
                 {"name":"Salt","amount":"1/16 tsp"},
                 {"name":"Heavy cream","amount":"1 cup"},
                 {"name":"Sugar","amount":"3 tbsp"},
                 {"name":"Vanilla extract","amount":"1/2 tsp"}]';
$ingr_obj = json_decode($ingredients);

foreach($ingr_obj as $row) {
  $ingr_id = $ingredient->insert(["name" => $row->name], "s");
  // insert into recipe_ingredient table
  $recipe_ingredient->insert(["recipe_id" => $recipe_id,
                              "ingredient_id" => $ingr_id,
                              "amount" => $row->amount], "iis");
}
?>
