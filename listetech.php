<?php
  $connect = con();
  $sql = "SELECT * FROM `Technique`";
  $result = $connect->query($sql);
  $tableTech = $result->fetch_all(MYSQLI_ASSOC);
?>
<table>
  <tr>
    <th>id</th>
    <th>Nom</th>
    <th>Action</th>
  </tr>
  <?php
    foreach ($tableTech as $key => $value) {
  ?>
  <tr>
    <td> <?= $value['id'] ?> </td>
    <td> <?= $value['Nom'] ?> </td>
    <td> <a href="?page=cree-statsTech&id=<?= $value['id'] ?>">ajout stat</a> </td>
  </tr>
  <?php
    }
  ?>
</table>
