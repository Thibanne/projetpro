<?php

function techJoueur($id){
  $connect = con();
  $sql = "SELECT
    Technique.id AS `idTechnique`,
    TechniqueUtilisateur.id AS `idTechJoueur`,
    Technique.*,
    TechniqueUtilisateur.*
  FROM TechniqueUtilisateur
  INNER JOIN Technique ON Technique.id = TechniqueUtilisateur.id_technique
  WHERE TechniqueUtilisateur.id_utilisateur = $id";
  $result = $connect->query($sql);
  $tableTechjoueur = $result->fetch_all(MYSQLI_ASSOC);
  return $tableTechjoueur;
}
// SELECT * FROM TechniqueUtilisateur
// LEFT JOIN DegatTechnique ON DegatTechnique.id_technique = TechniqueUtilisateur.id_technique
// LEFT JOIN CoutTechnique ON CoutTechnique.id_technique = TechniqueUtilisateur.id_technique
// LEFT JOIN Stats AS `StatsDegat` ON DegatTechnique.id_stats = StatsDegat.id
// LEFT JOIN Stats AS `StatsCout` ON CoutTechnique.id_stats = StatsCout.id
// WHERE TechniqueUtilisateur.id_utilisateur = 2
?>
