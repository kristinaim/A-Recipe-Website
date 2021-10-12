<?php
require_once "entry.php";

class User extends Entry {
  public function __construct() {
    parent::__construct("user");
  }
}
?>
