<?php
require_once "database.php";

class Entry {
	public $table;
	public $database;

	public function __construct($table) {
		$this->table = $table;
		$this->database = Database::getInstance();
	}

	public function select($key, $value) {
		$query = "SELECT * FROM $this->table WHERE $key=?";
		$stmt = $this->database->getConnection()->prepare($query);
		// TODO: different param types
		$stmt->bind_param("s", $value);
		$stmt->execute();
		$result = $stmt->get_result();
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		return json_encode($rows, JSON_PRETTY_PRINT);
	}

	// params is an associate array
	public function insert($params) {
		$fields = "(" . implode(array_keys($params), ",") . ")";
	  $qmarks = "(" . implode(array_fill(0, count($params), "?"), ",") . ")";
		$query = "INSERT INTO $this->table " . $fields . " VALUES " . $qmarks;
		return $query;
	}

	public function update() { 
		// get all keys and create string k[0]=?,k[1]=?,...k[n]=?
		$query = "UPDATE $this->table SET";
	}

	public function remove($id) {
		$query = "DELETE FROM $this->table WHERE id=?";
		$stmt = $this->database->getConnection()->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		return $stmt->affected_rows;
	}
}
?>
