<?php
$connect = con();
// Joueur
$sql = "SELECT * FROM `Utilisateur`";
$result = $connect->query($sql);
$tableJoueur = $result->fetch_all(MYSQLI_ASSOC);
// Technique
$sql = "SELECT * FROM `Technique`";
$result = $connect->query($sql);
$tableTechnique = $result->fetch_all(MYSQLI_ASSOC);
if (isset($_POST['createTechJoueur'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "INSERT INTO TechniqueUtilisateur
  (`id_utilisateur`, `id_technique`)
  VALUES ('$joueur', '$technique');";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
}
?>
<div class="offset-2 create-modForm">
  <form class="" action="" method="post">
    <div class="">
      <label for="">Pseudo</label>
      <select class="btn btn-secondary" class="" name="joueur">
        <?php foreach ($tableJoueur as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Pseudo']) ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="">
      <label for="">Technique</label>
      <select class="btn btn-secondary" class="" name="technique">
        <?php foreach ($tableTechnique as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Nom']) ?></option>
        <?php } ?>
      </select>
    </div>
    <input class="btn btn-secondary" type="submit" id="bouton" name="createTechJoueur" value="Créé" />
  </form>
</div>
