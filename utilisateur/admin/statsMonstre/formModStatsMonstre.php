<?php
if (isset($_POST['modStatsMonstre'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "UPDATE StatsMonstre
  SET `valeur` = '$valeurStatsMonstre'
  WHERE `id` = $_GET[idRow]";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
  header("Location:/?page=liste-monstreStats&id=$_GET[id]&nom=$_GET[nom]");
}
?>
<div class="offset-2 create-modForm">
  <!-- formulaire de modification -->
  <form class="" action="" method="post">
    <div>
      <label for="id"><strong><?= $_GET['stat'] ?></strong></label></br>
      <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ?>" />
    </div>
    <div>
      <label for="desc"><strong>Valeur : </strong></label></br>
      <input type="text" id="desc" name="valeurStatsMonstre" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="modStatsMonstre">Modifier</button>
  </form>
  <a href="/?page=liste-monstreStats&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Retour</a>
</div>
