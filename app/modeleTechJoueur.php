<?php

function techJoueur($id){
  $connect = con();
  $sql = "SELECT `Technique`.`id`, `Nom`, `Description` FROM TechniqueUtilisateur
  INNER JOIN Technique ON Technique.id = TechniqueUtilisateur.id_technique
  WHERE TechniqueUtilisateur.id_utilisateur = $id";
  $result = $connect->query($sql);
  $tableTechjoueur = $result->fetch_all(MYSQLI_ASSOC);
  return $tableTechjoueur;
}

?>
