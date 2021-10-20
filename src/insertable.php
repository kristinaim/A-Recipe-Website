<?php
interface Insertable {
  public function insert_id();
  public function insert($params, $types);
}
?>
