<?php
if (isset($_POST['modStatsTechCout'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "UPDATE CoutTechnique
  SET `Valeur` = '$valeurTech'
  WHERE `id` = $_GET[idRow]";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
}
?>
<div class="offset-2 create-modForm">
  <!-- formulaire de modification -->
  <form class="" action="" method="post">
    <div>
      <label for="id"><strong></strong></label></br>
      <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ?>" />
      <input type="hidden" id="id-stat" name="id-stat" value="<?= $_GET['nomDegat'] ?>" />
    </div>
    <div>
      <label for="desc"><strong>Valeur : </strong></label></br>
      <input type="text" id="desc" name="valeurTech" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="modStatsTechCout">Modifier</button>
  </form>
  <a href="/?page=liste-techniqueStats&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Retour</a>
</div>
