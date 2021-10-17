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
<form method="POST" action="submission.php">
  <input type="text" name="recipeName" placeholder="Recipe name" required>
  <select name="category" required><?=get_category_options()?></select>
  <select name="tag" multiple required><?=get_tag_options()?></select>
  <input type="text" name="ingredients" placeholder="Ingredients" required>
  <input type="text" name="instructions" placeholder="Instructions" required>
  <input type="submit" name="submit" value="Submit">
</form>
<?php require_once DIR_SRC."footer.php"; ?>
