<?php
$connect = con();
// Technique
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `Technique` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <a href="/?page=creer-technique" class="btn btn-secondary">Créer nouvelle technique</a>
  <table class="table table-striped listTableBackground">
    <thead>
      <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Description</th>
        <th class="listeTechAction">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (listeTech() as $key => $value) { ?>
        <tr>
          <th><?= $value['id'] ?></th>
          <th><?= $value['Nom'] ?></th>
          <td><?= $value['Description'] ?></td>
          <th>
            <a href="/?page=modify-technique&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
            <a href="/?page=liste-techniqueStats&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>" class="btn btn-secondary">Stats</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </th>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>