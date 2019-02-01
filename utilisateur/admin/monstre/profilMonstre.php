<?php
$connect = con();
if(isset($_GET['id'])){
  $sql = "SELECT
            Monstre.Nom AS 'Monstrenom',
            Monstre.id AS 'Monstreid',
            TechniqueMonstre.*,
            Technique.*
          FROM Monstre
          INNER JOIN TechniqueMonstre ON TechniqueMonstre.id_monstre=Monstre.id
          INNER JOIN Technique ON Technique.id=TechniqueMonstre.id_technique
          WHERE TechniqueMonstre.id_monstre = $_GET[id]";
  $result = $connect->query($sql);
  $tableTechMonstre = $result->fetch_all(MYSQLI_ASSOC);
?>
<table class="table table-striped listTableBackground">
  <thead>
    <tr>
      <th>Technique(s) de <?= $tableTechMonstre['0']['Monstrenom'] ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tableTechMonstre as $key => $value){ ?>
    <tr>
      <th><?= $value['Nom'] ?></th>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>
<a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
