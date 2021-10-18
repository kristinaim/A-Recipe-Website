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
  // insert into recipe table
  // insert into recipe tag table
  // insert into ingredient table
  // insert into recipe_ingredient table
  // insert into recipe_instruction table
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
        <select name="tag" multiple required><?=get_tag_options()?></select>
      </li>
      <li class="form-row">
        <label for="ingredients">Ingredients</label>
        <input type="text" name="ingredients[]" placeholder="16 oz penne pasta" required>
        <button id="addIngredient" onclick="insertBefore(addIngredient, ingredients[])">+</button>
      </li>
      <li class="form-row">
        <label for="instructions">Instructions</label>
        <input type="text" name="instructions[]" placeholder="In a medium pot over high heat, bring salted water to a boil..." required>
        <button id="addInstruction" onclick="insertBefore(addInstruction, instructions[])">+</button>
      </li>
      <li class="form-row">
        <input type="submit" name="submit" value="Submit">
      </li>
    </ul>
  </form>
</div>
<script>
function insertBefore(btnId, name) {
  const btn = document.getElementById(btnId);
  const input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("name". name);
  input.required = true;
  btn.parentNode.insertBefore(input, btn);
}
</script>
<?php require_once DIR_SRC."footer.php"; ?>
