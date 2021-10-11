<?php
class Database {
	private static const $CREDS = "../local/config.ini";
	private static $instance = null;
	private $conn;

	private function __construct() {
		$config = parse_ini_file($this::$CREDS);
		$this->conn = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["name"]);
	}

	public static getInstance() {
		if (!self::$instance) {
			self::$instance = new Database();
		}

		return self::$instance;
	}
}
?>
