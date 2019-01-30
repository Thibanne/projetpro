<?php
$connect = con();
// Monstre
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `Monstre` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Description</th>
        <th class="tableActionMonstre">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(listeMonstre() as $key => $value){ ?>
        <tr>
          <th><?= $value['id'] ?></th>
          <th><?= $value['Nom'] ?></th>
          <td><?= $value['Description'] ?></td>
          <th>
            <a href="/?page=profilMonstre&id=<?= $value['id'] ?>" class="btn btn-secondary">Afficher</a>
            <a href="/?page=modify-monstre&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
  <a href="/?page=creer-Monstre" class="btn btn-secondary">Créer nouveau monstre</a>
</div>
