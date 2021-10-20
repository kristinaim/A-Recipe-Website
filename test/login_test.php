<?php
require_once __DIR__."/../root.php";
require_once DIR_SRC."login.php";

$logged_in = login("gsnail@scu.edu", "hunter2");

if ($logged_in) {
  echo "Logged in successfully!" . "<br>";
} else {
  echo "Log in failed!" . "<br>";
}
?>
