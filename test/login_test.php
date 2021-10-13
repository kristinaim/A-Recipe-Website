<?php
/** @deprecated */
require_once __DIR__."/../src/login.php";

$logged_in = login("gsnail@scu.edu", "hunter2");

if ($logged_in) {
  echo "Logged in successfully!" . "<br>";
} else {
  echo "Log in failed!" . "<br>";
}
?>
