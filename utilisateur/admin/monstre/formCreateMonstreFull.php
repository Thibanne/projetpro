<?php
$connect = con();
// Monstre
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
  $newId = mysqli_insert_id($connect);
  header('Location: /?page=creer-monstreFull&id='.$newId);
  $connect->close();
}
$connect = con();
// MonstreFull
// $sql = "SELECT
//   Monstre.id AS 'idMonstre',
//   Monstre.*,
//   StatsMonstre.id AS 'idStatsMonstre',
//   TechniqueMonstre.id AS 'idTechMonstre',
//   Technique.id AS 'idTech',
//   Technique.Nom AS 'nomTech',
//   Technique.Description As 'descTech',
//   Stats.id AS 'idStats',
//   Stats.Nom AS 'nomStats'
// FROM Monstre
// LEFT JOIN StatsMonstre ON Monstre.id = StatsMonstre.id_monstre
// LEFT JOIN TechniqueMonstre ON Monstre.id = TechniqueMonstre.id_monstre
// LEFT JOIN Stats ON StatsMonstre.id = Stats.id
// LEFT JOIN Technique ON TechniqueMonstre.id_technique = Technique.id
// WHERE Monstre.id = 2";
$sql = "SELECT * FROM `Stats`";
$result = $connect->query($sql);
$tableStats = $result->fetch_all(MYSQLI_ASSOC);
$sql = "SELECT * FROM `Technique`";
$result = $connect->query($sql);
$tableTech = $result->fetch_all(MYSQLI_ASSOC);
if (isset($_POST['createMonstreFull'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $$key = $connect->real_escape_string($value);
  }
  $sql = "UPDATE Monstre
  SET `Nom` = '$monsterName', `Description` = '$descMonster'
  WHERE `id` = $_GET[id]";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql update: '. $connect->error;
  }
  // $sql = "INSERT INTO StatsMonstre
  // (`id_monstre`, `id_stats`, `Valeur`)
  // VALUES ('$_GET[id]', '$stats', '$valeur');";
  // $result = $connect->query($sql);
  // if ($result === false) {
  //   echo 'Erreur de sql: '. $connect->error;
  // }
  foreach ($_POST as $key => $value) {
    $sql = "INSERT INTO StatsMonstre
    (`id_monstre`, `id_stats`, `Valeur`)
    VALUES ('$_GET[id]', '$stats', '$valeur');";
    $result = $connect->query($sql);
    if ($result === false) {
      echo 'Erreur de sql: '. $connect->error;
    }
    echo '<pre>';
    print_r($stats, $value);
    echo '</pre>';
  }
  exit();
  $sql = "INSERT INTO TechniqueMonstre
  (`id_monstre`, `id_technique`)
  VALUES ($_GET[id], '$technique');";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  $connect->close();
  header('Location: /?page=liste-monstre');
}
?>
<!-- formulaire de création de monstre -->
<div id="createMonstreFullFormStep1" class="container create-modForm">
  <form method="post">
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="monsterName" value="" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descMonster" value="" />
    </div>
    <button id="createMonsterFullButtonStep1" class="btn btn-secondary" type="submit" name="createMonster">Créé</button>
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>

<div id="createMonstreFullFormStep2" class="container create-modForm hidden">
  <form class="" action="" method="post">
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="monsterName" value="<?= $_POST["monsterName"] ?? '' ?>" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descMonster" value="<?= $_POST["descMonster"] ?? '' ?>" />
    </div>
    <div class="">
      <label for="stats">Stats</label>
      <?php foreach ($tableStats as $key => $value){ ?>
        <div class="">
          <label for=""><strong><?= ucfirst($value['Nom']) ?></strong></label>
          <input type="hidden" name="stats" value="<?= $value['id'] ?>" />
        </div>
        <div class="">
          <label for="">Valeur</label>
          <input type="number" id="valeur" name="valeur" maxlenghth="4" min="-9999" max="9999" onchange="(this.value<=9999 && this.value>=-9999) ? bouton.disabled=false : bouton.disabled=true;" onkeyup="if(this.value>9999){this.value=999}else if(this.value<-9999){this.value=-999}" required />
        </div>
      <?php } ?>
    </div>
    <div class="">
      <label for="">Technique</label>
      <select class="btn btn-secondary" class="" name="technique">
        <?php foreach ($tableTech as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Nom']) ?></option>
        <?php } ?>
      </select>
    </div>
    <input class="btn btn-secondary" type="submit" id="bouton" name="createMonstreFull" value="Assigner" />
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
