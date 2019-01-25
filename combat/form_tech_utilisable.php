<?php
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
?>

<!-- Liste des actions utilisable en combat -->
<form class="" action="" method="post">
  <?php
  foreach ($techJoueur as $key => $value) {
    if(abs($value['cout']['mana']) <= $_SESSION['joueur']['mana']){
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $key ?>" title="<?= descriptionSkill($key ,$value) ?>" />
      </div>
      <?php
    }else{
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $key ?>" title="Pas assez de mana !" disabled />
      </div>
      <?php
    }
  }
  ?>
  <div class="skillButton">
    <a href="/">Fuite</a>
  </div>
</form>
