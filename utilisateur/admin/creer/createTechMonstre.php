<?php
$connect = con();
// Monstre
$sql = "SELECT * FROM `Monstre`";
$result = $connect->query($sql);
$tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
// Technique
$sql = "SELECT * FROM `Technique`";
$result = $connect->query($sql);
$tableTechnique = $result->fetch_all(MYSQLI_ASSOC);
if (isset($_POST['createTechMonstre'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "INSERT INTO TechniqueMonstre
  (`id_monstre`, `id_technique`)
  VALUES ('$monstre', '$technique');";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
}
?>
<div class="container create-modForm">
  <form class="" action="" method="post">
    <input type="hidden" name="id_techMonstre" value="<?= $_GET['id'] ?>">
    <div class="">
      <label for="">Monstre</label>
      <select class="btn btn-secondary" class="" name="monstre">
        <?php foreach ($tableMonstre as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Nom']) ?></option>
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
    <input class="btn btn-secondary" type="submit" id="bouton" name="createTechMonstre" value="Créé" />
  </form>
</div>
