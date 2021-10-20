<?php
// constants
require_once __DIR__."/../../root.php";

// requirements
require_once DIR_SRC."favorite_recipe_view.php";
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
$title = $_SESSION["name"]."'s Favorites - Homemade";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;

// select favorites
$fav_view = new FavoriteRecipeView();
$select = $fav_view->select(["user_id" => $_SESSION["user"]], "i");
$favorites_obj = json_decode($select);

if (!$favorites_obj) {
  $msg = "<p id = "favorerror">You don't have any favorited recipes!";
  $msg.= " Why don't you check out our ";
  $msg.= '<a href="'.LINK_WEB.'display/recipes.php">community-sourced recipe list</a> to get started?</p>';
  echo $msg;
  return; 
}

// TODO: create separate source file for this functionality
// display favorites
$category = null;
foreach($favorites_obj as $favorite) {
  // display each distinct recipe category
  if ($category != $favorite->category) {
    // end last category
    if ($category != null) {
      echo '</ul></div>';
    }
    $category = $favorite->category;
    echo '<div class="'.$category.'"><p id = "homelanding">'.$category.'</p><ul>';
  }
  echo '<li><p id = "homerecipe"><a href="'.LINK_WEB.'display/recipe.php?id='.$favorite->recipe_id.'" target="_blank">'.$favorite->name.'</a></p></li>';
}
// at least one recipe displayed
if (count($favorites_obj)) {
  echo '</ul></div>';
}

// footer
require_once DIR_SRC."footer.php";
?>
