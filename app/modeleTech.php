<?php

function sectionTech(){
  $connect = con();
  $sql = "SELECT COUNT(*) AS 'totalRow' FROM `Technique`";
  $result = $connect->query($sql);
  $compteurPageTech = $result->fetch_array(MYSQLI_ASSOC);
  $compteurPageTech = ceil($compteurPageTech['totalRow']/5);
  return $compteurPageTech;
}

function listeTech(){
  $connect = con();
  $limitViewTech = floor(($_GET['section']-1)*5);
  $sql = "SELECT * FROM `Technique` LIMIT $limitViewTech, 5";
  $result = $connect->query($sql);
  $limitViewTech = $result->fetch_all(MYSQLI_ASSOC);
  return $limitViewTech;
}

?>
