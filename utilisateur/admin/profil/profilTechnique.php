<?php
$connect = con();
if(isset($_GET['id'])){
  // Degats
  $sql = "SELECT
  Technique.id AS 'idTech',
  Technique.Nom AS 'techNom',
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
          </tr>
        </thead>
        <tbody>
          <?php foreach($tableTechProfilDegat as $key => $value){ ?>
            <tr>
              <th scope="row"><?= $value['valDegat'] ?></th>
              <th><?= $value['nomDegat'] ?></th>
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
          </tr>
        </thead>
        <tbody>
            <?php foreach($tableTechProfilCout as $key => $value){ ?>
            <tr>
              <th scope="row"><?= $value['valCout'] ?></th>
              <th><?= $value['nomCout'] ?></th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>
  <a href="/?page=liste-technique" class="btn btn-secondary">Retour liste</a>
</div>
