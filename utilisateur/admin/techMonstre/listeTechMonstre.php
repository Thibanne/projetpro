<?php
$connect = con();
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `TechniqueMonstre` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
if(isset($_GET['id'])){
  $sql = "SELECT
    Monstre.Nom AS 'Monstrenom',
    Monstre.id AS 'Monstreid',
    TechniqueMonstre.id AS 'idTechMonstre',
    Technique.id AS 'idTech',
    Technique.*
  FROM Monstre
  INNER JOIN TechniqueMonstre ON TechniqueMonstre.id_monstre=Monstre.id
  INNER JOIN Technique ON Technique.id=TechniqueMonstre.id_technique
  WHERE TechniqueMonstre.id_monstre = $_GET[id]";
  $result = $connect->query($sql);
  $tableTechMonstre = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  <table class="table table-striped listTableBackground">
    <a href="/?page=creer-techMonstre&id=<?= $_GET['id'] ?>" class="btn btn-secondary">Assigner technique</a>
    <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
    <table class="table table-striped listTableBackground">
      <thead>
        <tr>
          <th>Technique(s) de <?= $tableTechMonstre['0']['Monstrenom'] ?></th>
          <th class="tableActionMonstre">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($tableTechMonstre as $key => $value){ ?>
          <tr>
            <th><?= $value['Nom'] ?></th>
            <th>
              <a href="#" class="btn btn-secondary">Modifier</a>
              <form class="d-inline" action="" method="post">
                <input type="hidden" name="id" value="<?= $value['idTechMonstre'] ?>">
                <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
              </form>
            </th>
          <?php } ?>
        </tr>
      </tbody>
    </table>
  <?php } ?>
