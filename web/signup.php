<?php require_once __DIR__."/../root.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"-->
    <link rel="stylesheet" href="<?=LINK_CSS?>styles.css" type="text/css">
    <title>Sign Up - A Recipe Website</title>
  </head>
  <body>
    <?php
    require_once DIR_SRC."login.php";
    require_once DIR_SRC."user.php";
    
    ini_set("session.gc.maxlifetime", 3600); // keep session data for 1 hour
    ini_set("session.cookie_secure", 1); // https://www.php.net/manual/en/function.setcookie.php#125241
    session_set_cookie_params(3600); // clients remember session id for 1 hour
    session_start();
    session_regenerate_id(true);

    $user = new User();
    // when user clicks submit button
    if (isset($_POST["submit"])) {
      // verify passwords match
      if ($_POST["password"] != $_POST["confirmPassword"]) {
        echo "Passwords must match. Please try again." . "<br>";
        return;
      }
      // don't redirect if user was not created
      if (!create_user($_POST["email"], $_POST["firstName"], $_POST["lastName"], $_POST["password"])) {
        return;
      }
      $json_obj = json_decode($user->select(["email" => $_POST["email"]], "s"))[0];
      // track user info
      $_SESSION["login"] = login($_POST["email"], $_POST["password"]);
      $_SESSION["email"] = $json_obj->email;
      $_SESSION["name"] = $json_obj->first_name;
      $_SESSION["user"] = $json_obj->user_id;
      // redirect to home page
      header("Location: ".LINK_WEB."display/home.php");
    }
    ?>
    <p id = "signup1">Sign up for an account</p>
    <form method="POST" action="signup.php">
      <p id = "signID">Email</p><input id = "id" type="email" name="email" placeholder="bbronco@scu.edu" required>
      <p id = "signID">First name</p><input id = "id" type="text" name="firstName" placeholder="Bucky" required>
      <p id = "signID">Last name</p><input id = "id" type="text" name="lastName" placeholder="Bronco" required>
      <p id = "signID">Password</p><input id = "id" type="password" name="password" placeholder="ScoCos1851!" required>
      <p id = "signID">Confirm password</p><input id = "id" type="password" name="confirmPassword" placeholder="ScoCos1851!" required>
      <button id = "signupsubmit" name="submit">SIGN UP</button>
      <!--input type="submit" name="submit" value="Submit"-->
    </form>
<?php require_once DIR_SRC."footer.php"; ?>
