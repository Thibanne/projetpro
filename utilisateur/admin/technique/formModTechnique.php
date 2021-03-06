<?php
if (isset($_POST['modTechnique'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "UPDATE Technique
  SET `Nom` = '$techName', `Description` = '$descTech'
  WHERE `id` = $_GET[id]";
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
    </div>
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="techName" value="" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descTech" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="modTechnique">Modifier</button>
  </form>
  <a href="/?page=liste-technique&section=1" class="btn btn-secondary">Retour liste</a>
</div>
