<?php require_once(__DIR__."/../root.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?=LINK_CSS?>styles.css" type="text/css">
<script src="<?=LINK_JS?>scripts-main.js"></script>
  <title>A Recipe Website</title>
</head>
<body onload="onRecipeLoad()">
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
    <div class ="search_container">
    <div class ="search_bar">
      <form action="header.php" method="POST">
        <input type="text" placeholder="Search for 'veggie lasagna'" name="keyword">
        <button type="submit" name = search>
          <i class="fa fa-search" style="font-size:18px; color:black;"></i>
        </button>
      </form>
    </div>
    <style>
    .search_container {
      padding-top: 20px;
    }

    .search_bar {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 30%;
    }
    
    input[type=text]{
      display: inline-block;
      font-size: 15px;
      margin-right: 0;
      width: 70%;
      height:35px;
    }

    input[type=text]:focus {
      border: 3px solid #555;
    }

    button {
      display: inline-block;
      background: #ddd;
      margin-left: 0;
      border: none;
      cursor: pointer;
      width: 10%;
    }

    button:hover {
      background: #ccc;
    }
    </style>
  </header>
<?php

//To be displayed

/* Beginning of Display Database Info*/

    // Check if the form has been submitted:
if (isset($_POST["search"])) {

  if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
  }
  session_start();
  $_SESSION['keyword'] = $keyword;

    //Display search result
  header("Location: ".DIR_WEB."display/search_results.php"); 
  
}  
 //End of main isset conditional

?>