<?php

function listeMonstre(){
  $connect = con();
  $sql = "SELECT * FROM `Monstre`";
  $result = $connect->query($sql);
  $tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
  return $tableMonstre;
}

function statsMonstre(){
  $connect = con();
  $sql = "SELECT * FROM `StatsMonstre`";
  $result = $connect->query($sql);
  $tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
  return $tableMonstre;
}
?>
