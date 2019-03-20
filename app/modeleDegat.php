<?php
// retourne un tableau de dégâts selon l'id et le nom de la technique demandé
function techDegat($id, $nom=''){
  $connect = con();
  if ($nom == '') {
    $sql = "SELECT * FROM DegatTechnique
    INNER JOIN Stats ON DegatTechnique.id_stats = Stats.id
    WHERE DegatTechnique.id_technique = $id";
  }else{
    $sql = "SELECT * FROM DegatTechnique
    INNER JOIN Stats ON DegatTechnique.id_stats = Stats.id
    WHERE DegatTechnique.id_technique = $id AND Stats.Nom = '$nom'";
  }
  $result = $connect->query($sql);
  $tableCout = $result->fetch_all(MYSQLI_ASSOC);
  return $tableCout;
}

?>
