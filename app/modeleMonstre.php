<?php

// simple fonction qui permet de récupéré toute les donné dans la table 'Monstre'
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

function showMonstre($id){
  $connect = con();
  $sql = "SELECT
    Stats.Nom,
    StatsMonstre.valeur
  FROM `Monstre`
  LEFT JOIN StatsMonstre ON Monstre.id=StatsMonstre.id_monstre
  LEFT JOIN Stats ON StatsMonstre.id_stats=Stats.id
  WHERE Monstre.id = '$id'";
  $result = $connect->query($sql);
  $tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
  return $tableMonstre;
}


?>
