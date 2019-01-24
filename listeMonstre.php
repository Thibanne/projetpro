<?php
$connect = con();
// Monstre
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM Monstre WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
$sql = "SELECT * FROM `Monstre`";
$result = $connect->query($sql);
$tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="col align-self-center">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tableMonstre as $key => $value){ ?>
        <tr>
          <th><?= $value['id'] ?></th>
          <th><?= $value['Nom'] ?></th>
          <th>
            <a href="/?page=profilMonstre&id=<?= $value['id'] ?>" class="btn btn-secondary">Afficher</a>
            <a href="#" class="btn btn-secondary">Modifier</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
  <a href="/?page=creer-Monstre" class="btn btn-secondary">Créer nouveau</a>
</div>
