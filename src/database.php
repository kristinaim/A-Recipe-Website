<?php
/**
 * Class to define a database connection. 
 */
class Database {
  const CREDS = "../local/config.ini";
  private static $instance = null;
  private $conn;

  private function __construct() {
    $config = parse_ini_file($this::CREDS);
    $this->conn = new mysqli($config["host"], $config["user"], $config["pass"], $config["name"]);
  }

  // prevent duplication
  private function __clone() { }
   
  // create or return a single instance of a database
  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Database();
    }

    return self::$instance;
  }

  // return the database connection
  public function getConnection() {
    return $this->conn;
  }
}
?>
