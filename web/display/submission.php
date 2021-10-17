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
<h1>Add a Recipe</h1>
<form method="POST" action="submission.php">
  <label for="recipeName">Recipe Name</label>
  <input type="text" name="recipeName" placeholder="Pasta Primavera" required>
  <label for="servingSize">Serving Size</label>
  <input type="range" name="servingSize" min="1" max="16" value="4" onInput="this.nextElementSibling.value = this.value" required>
  <output>4</output>
  <label for="category">Category</label>
  <select name="category" required><?=get_category_options()?></select>
  <label for="tag">Tags</label>
  <select name="tag" multiple required><?=get_tag_options()?></select>
  <label for=ingredients">Ingredients</label>
  <input type="text" name="ingredients" placeholder="16 oz penne pasta" required>
  <label for="instructions">Instructions</label>
  <input type="text" name="instructions" placeholder="In a medium pot over high heat, bring salted water to a boil..." required>
  <input type="submit" name="submit" value="Submit">
</form>
<?php require_once DIR_SRC."footer.php"; ?>
