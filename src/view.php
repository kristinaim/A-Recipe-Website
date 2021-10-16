<?php
require_once "database.php";
require_once "selectable.php";
/**
 * Class to define a view in a database.
 */
class View implements Selectable {
  public $view;
  public $database;

  public function __construct($view) {
    $this->view = $view;
    $this->database = Database::get_instance();
  }

  public function select($params=null, $types=null) {
    $query = "SELECT * FROM $this->view";
    
    if ($params != null) {
      $clause = " WHERE ";
      $clause .= implode(array_map(function ($elem) { return $elem . "=?"; },
                         array_keys($params)), " AND ");
      $query .= $clause;
      $stmt = $this->database->get_connection()->prepare($query);
      $stmt->bind_param($types, ...array_values($params));
    } else {
      $stmt = $this->database->get_connection()->prepare($query);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    return empty($rows) ? null : json_encode($rows, JSON_PRETTY_PRINT);
  }
}
?>
