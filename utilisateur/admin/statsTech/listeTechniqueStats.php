<?php
$connect = con();
if(isset($_POST['delDegat'])) {
    $deletequery = "DELETE FROM `DegatTechnique` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}else if(isset($_POST['delCout'])) {
    $deletequery = "DELETE FROM `CoutTechnique` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
if(isset($_GET['id'])){
  // Degats
  $sql = "SELECT
    Technique.id AS 'idTech',
    Technique.Nom AS 'techNom',
    DegatTechnique.id AS 'idDgTech',
    DegatTechnique.Valeur AS 'valDegat',
    statsDegat.Nom AS 'nomDegat'
  FROM Technique
  LEFT JOIN DegatTechnique ON Technique.id = DegatTechnique.id_technique
  LEFT JOIN Stats AS `statsDegat` ON DegatTechnique.id_stats = statsDegat.id
  WHERE Technique.id = $_GET[id]";
  $result = $connect->query($sql);
  $tableTechProfilDegat = $result->fetch_all(MYSQLI_ASSOC);
  // Cout
  $sql = "SELECT
    Technique.id AS 'idTech',
    Technique.Nom AS 'techNom',
    CoutTechnique.id AS 'idCoutTech',
    CoutTechnique.Valeur AS 'valCout',
    statsCout.Nom AS 'nomCout'
  FROM Technique
  LEFT JOIN CoutTechnique ON Technique.id = CoutTechnique.id_technique
  LEFT JOIN Stats AS `statsCout` ON CoutTechnique.id_stats = statsCout.id
  WHERE Technique.id = $_GET[id]";
  $result = $connect->query($sql);
  $tableTechProfilCout = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  <div class="TableTechCentralAlign">
    <a href="/?page=creer-statsTechnique&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Assigner stats</a>
    <a href="/?page=liste-technique" class="btn btn-secondary">Retour liste</a>
    <table class="table listTableBackground tableTechProfilAssoc">
      <thead>
        <tr>
          <th scope="col" style="width:33vw;">Valeur de <?= $tableTechProfilDegat['0']['techNom'] ?></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">Dégât</th>
          <th scope="col">Coût</th>
        </tr>
      </tbody>
    </table>
    <div class="tableTechProfilMiddleReduc">
      <table class="table listTableBackground">
        <thead>
          <tr>
            <th scope="col">Valeur</th>
            <th scope="col">Stats</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($tableTechProfilDegat as $key => $value){ ?>
            <tr>
              <th scope="row"><?= $value['valDegat'] ?></th>
              <th><?= $value['nomDegat'] ?></th>
              <th>
                <a href="/?page=modify-statsTechDegat&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>&statNom=<?= $value['nomDegat'] ?>&idRow=<?= $value['idDgTech'] ?>" class="btn btn-secondary">Modifier</a>
                <form class="d-inline" action="" method="post">
                  <input type="hidden" name="id" value="<?= $value['idDgTech'] ?>">
                  <button class="btn btn-warning" type="submit" name="delDegat">Supprimer</button>
                </form>
              </th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="tableTechProfilMiddleReduc">
      <table class="table listTableBackground">
        <thead>
          <tr>
            <th scope="col">Valeur</th>
            <th scope="col">Stats</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($tableTechProfilCout as $key => $value){ ?>
            <tr>
              <th scope="row"><?= $value['valCout'] ?></th>
              <th><?= $value['nomCout'] ?></th>
              <th>
                <a href="/?page=modify-statsTechCout&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>&statNom=<?= $value['nomCout'] ?>&idRow=<?= $value['idCoutTech'] ?>" class="btn btn-secondary">Modifier</a>
                <form class="d-inline" action="" method="post">
                  <input type="hidden" name="id" value="<?= $value['idCoutTech'] ?>">
                  <button class="btn btn-warning" type="submit" name="delCout">Supprimer</button>
                </form>
              </th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>

</div>
