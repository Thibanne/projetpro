<?php
// fonction "technique du monstre"
// selon l'id du monstre choisi, affiche un tableau retournant le nom avec ses valeurs de coût et dégât
function techMonstre($id){
  $connect = con();
  $sql = "(SELECT 'Degat' AS action,
    Technique.id AS 'idTech',
    Technique.Nom AS 'nomTech',
    statsDegat.Nom AS 'statNom',
    DegatTechnique.Valeur AS 'valeurTech'
  FROM TechniqueMonstre
  INNER JOIN Technique ON Technique.id = TechniqueMonstre.id_technique
  LEFT JOIN DegatTechnique ON DegatTechnique.id_technique = Technique.id
  LEFT JOIN Stats AS `statsDegat` ON statsDegat.id=DegatTechnique.id_stats
  WHERE TechniqueMonstre.id_Monstre = $id)
  UNION
  (SELECT 'Cout' AS action,
    Technique.id AS 'idTech',
    Technique.Nom AS 'nomTech',
    statsCout.Nom AS 'statCoutNom',
    CoutTechnique.Valeur AS 'valeurCoutTech'
  FROM TechniqueMonstre
  INNER JOIN Technique ON Technique.id = TechniqueMonstre.id_technique
  LEFT JOIN CoutTechnique ON CoutTechnique.id_technique = Technique.id
  LEFT JOIN Stats AS `statsCout` ON statsCout.id=CoutTechnique.id_stats
  WHERE TechniqueMonstre.id_Monstre = $id)";
  $result = $connect->query($sql);
  $tableTechMonstre = $result->fetch_all(MYSQLI_ASSOC);
  return $tableTechMonstre;
}
?>
