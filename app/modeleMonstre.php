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
  $sql = "SELECT
    StatsMonstre.id AS 'idStatsMonstre',
    StatsMonstre.valeur AS 'valeurStatsMonstre',
    Monstre.*,
    Stats.nom AS 'nomStats'
  FROM `StatsMonstre`
  LEFT JOIN Monstre ON StatsMonstre.id_monstre = Monstre.id
  LEFT JOIN Stats ON StatsMonstre.id_stats = Stats.id
  WHERE Monstre.id = $_GET[id]";
  $result = $connect->query($sql);
  $tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
  return $tableMonstre;
}
?>
