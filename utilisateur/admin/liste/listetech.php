<?php
  $connect = con();
  $sql = "SELECT * FROM `Technique`";
  $result = $connect->query($sql);
  $tableTech = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="col align-self-center">
<table class="table table-striped">
  <thead>
  <tr>
    <th>id</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php
    foreach ($tableTech as $key => $value) {
  ?>
  <tr>
    <td> <?= $value['id'] ?> </td>
    <td> <?= $value['Nom'] ?> </td>
    <td> <?= $value['Description'] ?> </td>
    <td> <a href="?page=cree-statsTech&id=<?= $value['id'] ?>">ajout stat</a> </td>
  </tr>
  <?php
    }
  ?>
  </tbody>
</table>
