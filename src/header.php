<?php require_once(__DIR__."/../root.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?=LINK_CSS?>styles.css" type="text/css">
  <title>A Recipe Website</title>
</head>
<body>
  <header>
    <div class="img">
    </div>
    <div class="head">
      <ul id="head_list">
        <li>
          <a href="<?=LINK_WEB?>display/home.php">
            <img src="<?=LINK_IMG?>homemade.png" id="homemade"/>
          </a>
        </li>
        <li>
          <a href="<?=LINK_WEB?>display/recipes.php">Recipes</a>
        </li>
        <li>
          <a href="<?=LINK_WEB?>display/favorites.php">Favorites</a>
        </li>
        <li>
          <a href="<?=LINK_WEB?>display/submission.php">Add a Recipe</a>
        </li>
        <li>
          <a href="<?=LINK_WEB?>logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </header>
