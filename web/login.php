<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include(__DIR__."/../src/head.html"); ?>
    <title>Login - A Recipe Website</title>
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
          header("Location: " . "display/home.php");
        } else {
          echo "Invalid email or password." . "<br>";
        }
      } catch (Exception $e) {
        echo $e . "<br>";
      }
    }
    ?>
    <form method="POST", action="login.php">
      <input type="email" name="email" id="loginEmail" placeholder="Email" required>
      <input type="password" name="password" id="loginPassword" placeholder="Password" required">
      <a href="signup.php">Don't have an account?</a>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
