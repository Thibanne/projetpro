<?php
$connect = con();
// Monstre
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `StatsMonstre` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <a href="/?page=creer-statsMonstre&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Assigner stats</a>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
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
          <th><?= $value['idStatsMonstre'] ?></th>
          <th><?= $value['nomStats'] ?></th>
          <td><?= $value['valeurStatsMonstre'] ?></td>
          <th>
            <a href="/?page=modify-statsMonstre&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>&idRow=<?= $value['idStatsMonstre'] ?>&stat=<?= $value['nomStats'] ?>" class="btn btn-secondary">Modifier</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['idStatsMonstre'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
