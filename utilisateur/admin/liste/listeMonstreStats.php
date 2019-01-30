<?php
$connect = con();
// Monstre
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `Monstre` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <table class="table table-striped listTableBackground">
    <thead>
      <tr>
        <th>Id</th>
        <th>Stats</th>
        <th>Valeur</th>
        <th class="tableActionMonstre">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(statsMonstre() as $key => $value){ ?>
        <tr>
          <th><?= $value['id'] ?></th>
          <th><?= $value['id_stats'] ?></th>
          <td><?= $value['valeur'] ?></td>
          <th>
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
  <a href="/?page=creer-statsMonstre&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Assigner stats</a>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
