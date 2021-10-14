<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include(__DIR__."/../src/head.html"); ?>
		<title>Signup</title>
	</head>
  <body>
    <?php
    require_once(__DIR__."/../src/login.php");
    require_once(__DIR__."/../src/user.php");
    
    ini_set("session.gc.maxlifetime", 3600); // keep session data for 1 hour
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
      $json_obj = json_decode($user->select(["email" => $_POST["email"]], "s"));
      // track user email and id
      $_SESSION["login"] = login($_POST["email"], $_POST["password"]);
      $_SESSION["email"] = $json_obj[0]->email;
      $_SESSION["user"] = $json_obj[0]->user_id;
      // redirect to home page
      header("Location: " . "display/favorites.php");
    }
    ?>
    <form method="POST" action="signup.php">
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="firstName" placeholder="First name" required>
      <input type="text" name="lastName" placeholder="Last name" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirmPassword" placeholder="Confirm password" required>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
