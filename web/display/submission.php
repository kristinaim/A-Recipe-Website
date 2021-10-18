<?php
// constants
require_once __DIR__."/../../root.php";

// requirements
require_once DIR_SRC."submission.php";
session_start();

// verify user is logged in
if (!isset($_SESSION["login"])) {
  header("Location: ".LINK_WEB."login.php");
}

// header
ob_start();
require_once DIR_SRC."header.php";
$buffer = ob_get_contents();
ob_end_clean();
$title = "Submission - A Recipe Website";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// when user clicks submit button
if (isset($_POST["submit"])) {
  submit_recipe();
  /*
  // insert into recipe table
  $recipe_name = $_POST["recipeName"];
  $serving_size = $_POST["servingSize"];
  $category = $_POST["category"];
  
  // insert into recipe tag table
  // optional so check if set
  if (isset($_POST["tag"])) {
    foreach ($_POST["tag"] as $tag) {
      echo $tag;
    }
  }
  
  // insert into ingredient table
  // valid ingredient has the following format:
  // <quantity>\s?<unit>? <ingredient>
  // quantity: decimal, whole number, or fraction
  // unit:
  $qty_match = '(?P<quantity>\d+(\.|\/)?\d*)';
  
  $units_mass_metric = ['mg', 'milligram[s]?', 'g(ram[s]?)?', 'kg', 'kilogram[s]?'];
  $units_mass_imperial = ['oz', 'ounce[s]?', 'lb[s]?', 'pound[s]?'];
  $units_vol_metric = ['ml', 'milliliter[s]?', 'l(iter[s]?)?'];
  $units_vol_imperial = ['tsp', 'teaspoon[s]?', 'tbsp', 'tablespoon[s]?', 'fl oz', 'fluid ounce[s]?', 'c(up[s]?)?', 'qt', 'quart[s]?', 'pt', 'pint[s]?', 'gal(lon[s]?)?'];
  $units = array_merge($units_mass_metric, $units_mass_imperial, $units_vol_metric, $units_vol_imperial);
  $unit_match = '(?P<unit>('.implode($units, "|").')*)';
  
  $ingr_match = '(?P<ingredient>\w+((\s|-)?\w)*)';
  $re = '/^'.$qty_match.'\s?'.$unit_match.'\s?'.$ingr_match.'$/mi';
  #$re = '/(?P<quantity>\d+(\.|\/)?\d*)\s?(?P<unit>(oz|cup|tsp|g)*)\s?(?P<ingredient>\w+((\s|-)?\w)*)/';
  // ingredient: rest of string after space
  $ingredients = $_POST["ingredients"];
  foreach ($ingredients as $ingr) {
    preg_match($re, $ingr, $matches);
    echo 'quantity: '.$matches["quantity"]."<br>";
    echo 'unit: '.$matches["unit"]."<br>";
    echo 'ingredient: '.$matches["ingredient"]."<br>";
  }
  // insert into recipe_ingredient table
  $instructions = $_POST["instructions"];
  // insert into recipe_instruction table
  echo 'recipe name: '.$recipe_name."</br>";
  echo 'serving size: '.$serving_size."</br>";
  echo 'tag: ';
  print_r($tag);
  echo "</br>ingredients:";
  print_r($ingredients);
  echo "</br>instructions:";
  print_r($instructions);*/
}
?>
<div class="recipe_sub_container">
  <p id="recipe_sub_form">Recipe Submission Form</p>
  <form method="POST" action="submission.php">
    <ul class="form-wrapper">
      <li class="form-row">  
        <label for="recipeName">Recipe Name</label>
        <input type="text" id="recipeName" name="recipeName" placeholder="Pasta Primavera" required>
      </li>
      <li class="form-row">
        <label for="servingSize">Serving Size</label>
        <input type="range" name="servingSize" min="1" max="16" value="4" onInput="this.nextElementSibling.value = this.value" required>
        <output>4</output>
      </li>
      <li class="form-row">
        <label for="category">Category</label>
        <select name="category" required><?=get_category_options()?></select>
      </li>
      <li class="form-row">
        <label for="tag">Tags</label>
        <select name="tag[]" multiple><?=get_tag_options()?></select>
      </li>
      <li class="form-row">
        <label for="ingredients">Ingredients</label>
        <input type="text" name="ingredients[]" placeholder="16 oz penne pasta" required>
        <input type="button" id="addIngredient" input-name="ingredients[]" value="+" onclick="addInput(this.id)">
      </li>
      <li class="form-row">
        <label for="instructions">Instructions</label>
        <input type="text" name="instructions[]" placeholder="In a medium pot over high heat, bring salted water to a boil..." required>
        <input type="button" id="addInstruction" input-name="instructions[]" value="+" onclick="addInput(this.id)">
      </li>
      <li class="form-row">
        <input type="submit" name="submit" value="Submit">
      </li>
    </ul>
  </form>
</div>
<script>
function addInput(btnId) {
  const btn = document.getElementById(btnId);
  const input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("name", btn.getAttribute("input-name"));;
  btn.parentNode.insertBefore(input, btn);
}
</script>
<?php require_once DIR_SRC."footer.php"; ?>
