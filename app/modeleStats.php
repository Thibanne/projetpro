<?php

function listeStats(){
  $connect = con();
  $sql = "SELECT * FROM `Stats`";
  $result = $connect->query($sql);
  $tableStats = $result->fetch_all(MYSQLI_ASSOC);
  return $tableStats;
}

?>
