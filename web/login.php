<?php require_once(__DIR__."/../root.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"-->
    <link rel="stylesheet" href="<?=LINK_CSS?>styles.css" type="text/css">
    <title>Log In - A Recipe Website</title>
  </head>
  <body>
    <?php
    require_once(DIR_SRC."login.php");
    require_once(DIR_SRC."user.php");
    
    ini_set("session.gc.maxlifetime", 3600); // keep session data for 1 hour
    session_set_cookie_params(3600); // clients remember session id for 1 hour
    session_start();
    session_regenerate_id(true);
    
    // redirect if already logged in 
    if (isset($_SESSION["login"])) {
      header("Location: ".LINK_WEB."display/home.php");
    }
    
    $user = new User();
    
    // when user clicks submit button
    if (isset($_POST["submit"])) {
      try {
        $_SESSION["login"] = login($_POST["email"], $_POST["password"]);
        
        // login successful
        if ($_SESSION["login"]) {
          $json_obj = json_decode($user->select(["email" => $_POST["email"]], "s"))[0];
          // track user info
          $_SESSION["email"] = $json_obj->email;
          $_SESSION["name"] = $json_obj->first_name;
          $_SESSION["user"] = $json_obj->user_id;
          // redirect to home page
          header("Location: ".LINK_WEB."display/home.php");
        } else {
          echo "Invalid email or password." . "<br>";
        }
      } catch (Exception $e) {
        echo $e . "<br>";
      }
    }
    ?>
    <main>
      <div class="signin_container">
        <p id="signin">Sign into your account</p>
        <div id="signinfo">
          <a href="signup.php">Need an account? <b>Create one.</b></a>
        </div>
        <div class="rectangle">
          <form method="POST" action="login.php">
            <label id="signID" for="email">E-mail</label>
            <input type="email" name="email" id="id" placeholder="Your e-mail address" required>
            <label id="signID" for="password">Password</label>
            <input type="password" name="password" id="id" placeholder="Your password" required>
            <!--$input id="signBtn" type="submit" name="submit" value="SIGN IN"-->
            <button id="signBtn" type="submit" name="submit">SIGN IN</button>
          </form>
        </div>
      </div>
    </main>
<?php require_once(DIR_SRC."footer.php"); ?>
