<?php
require_once __DIR__."/../src/recipe_category.php";
require_once __DIR__."/../src/recipe.php";
require_once __DIR__."/../src/ingredient.php";
require_once __DIR__."/../src/recipe_ingredient.php";
require_once __DIR__."/../src/recipe_instruction.php";

// get dessert category id
$recipe_category = new RecipeCategory();
$dessert = $recipe_category->select(["category" => "Dessert"], "s");
$dessert = json_decode($dessert)[0];
$dessert->recipe_category_id;

// insert into recipe table
$recipe = new Recipe();
$recipe_str = '{"name":"Pot de Crème","serving_size":4,"recipe_category_id":' . $dessert->recipe_category_id . '}';
$recipe_arr = json_decode($recipe_str, true);
$recipe_id = $recipe->insert($recipe_arr, "sii");

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

// insert into recipe_instruction table
$recipe_instruction = new RecipeInstruction();
$instructions = '[{"step":"In a small pot over medium heat, add the heavy cream, sugar, and vanilla extract."},
                  {"step":"Meanwhile, chop the chocolate into very small pieces."},
                  {"step":"Add the chopped chocolate to a mixing bowl along with the instant coffee and salt."},
                  {"step":"Once the cream mixture starts to simmer, remove it from the heat and pour into the mixing bowl."},
                  {"step":"Let sit for 1 minute, then begin whisking until glossy."},
                  {"step":"Pour into individual serving containers and place into the fridge to thoroughly thicken, at least 3-4 hours."}]';

$instr_obj = json_decode($instructions);

foreach($instr_obj as $idx=>$row) {
  $recipe_instruction->insert(["recipe_id" => $recipe_id, "step" => $row->step, "step_index" => $idx], "isi");
}
?>
