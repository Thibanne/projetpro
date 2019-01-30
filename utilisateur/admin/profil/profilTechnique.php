<?php
$connect = con();
if(isset($_GET['id'])){
  $sql = "SELECT
    Technique.id AS 'idTech',
    Technique.Nom AS 'techNom',
    CoutTechnique.Valeur AS 'valCout',
    DegatTechnique.Valeur AS 'valDegat',
    Stats.Nom AS 'nomStats'
  FROM Technique
  LEFT JOIN CoutTechnique ON Technique.id = CoutTechnique.id_technique
  LEFT JOIN DegatTechnique ON Technique.id = DegatTechnique.id_technique
  LEFT JOIN Stats ON Technique.id = Stats.id
  WHERE Technique.id = $_GET[id]";
  $result = $connect->query($sql);
  $tableTechProfil = $result->fetch_all(MYSQLI_ASSOC);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Valeur de <?= $tableTechProfil['0']['techNom'] ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tableTechProfil as $key => $value){ ?>
    <tr>
      <th><?= $value['valCout'] ?></th>
      <th><?= $value['nomStats'] ?></th>
      <th><?= $value['valDegat'] ?></th>
      <th><?= $value['nomStats'] ?></th>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>
<a href="/?page=liste-technique" class="btn btn-secondary">Retour liste</a>
