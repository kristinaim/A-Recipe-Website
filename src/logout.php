<?php
session_start();
$_SESSION = array(); // unset all session variables

// delete session cookies
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time()-42000, $params["path"], $params["domain"], $params["secure"],
						$params["httponly"]);
}

session_destroy();
header('Location: ../web/login.php');
?>
