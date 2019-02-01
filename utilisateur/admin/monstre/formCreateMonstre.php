<?php
$connect = con();
// Monstre
$sql = "SELECT * FROM `Monstre`";
$result = $connect->query($sql);
$tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
if (isset($_POST['createMonster'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "INSERT INTO Monstre
  (`Nom`, `Description`)
  VALUES ('$monsterName', '$descMonster');";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
}
?>
<!-- formulaire de création de monstre -->
<div class="container create-modForm">
  <form class="" action="" method="post">
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="monsterName" value="" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descMonster" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="createMonster">Créé</button>
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
