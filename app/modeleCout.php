<?php
// retourne un tableau de coût selon l'id et le nom de la technique demandé
function techCout($id, $nom=''){
  $connect = con();
  if ($nom == '') {
    $sql = "SELECT * FROM CoutTechnique
    INNER JOIN Stats ON CoutTechnique.id_stats = Stats.id
    WHERE CoutTechnique.id_technique = $id";
  }else{
    $sql = "SELECT * FROM CoutTechnique
    INNER JOIN Stats ON CoutTechnique.id_stats = Stats.id
    WHERE CoutTechnique.id_technique = $id AND Stats.Nom = '$nom'";
  }
  $result = $connect->query($sql);
  $tableCout = $result->fetch_all(MYSQLI_ASSOC);
  return $tableCout;
}

?>
