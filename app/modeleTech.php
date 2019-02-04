<?php

function listeTech(){
  $connect = con();
  $sql = "SELECT * FROM `Technique`";
  $result = $connect->query($sql);
  $tableTech = $result->fetch_all(MYSQLI_ASSOC);
  return $tableTech;
}

?>
