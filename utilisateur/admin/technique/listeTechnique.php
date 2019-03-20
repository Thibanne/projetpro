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
  <?php for ($i=1; $i < sectionTech()+1 ; $i++) { ?>
    <a href="/?page=liste-technique&section=<?= $i ?>" class="btn btn-info"><?= $i ?></a>
  <?php } ?>
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
          <td class="max-width-description"><?= $value['Description'] ?></td>
          <th>
          <div class="dropdown d-md-none">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu background-dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/?page=modify-technique&id=<?= $value['id'] ?>">Modifier</a>
              <a class="dropdown-item" href="/?page=liste-techniqueStats&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>">Stats</a>
              <form class="dropdown-item" action="" method="post">
                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                <button class="btn btn-link textLikeLink" type="submit" name="del">Supprimer</button>
              </form>
            </div>
          </div>
          <div class="dropdown d-none d-md-block">
            <a href="/?page=modify-technique&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
            <a href="/?page=liste-techniqueStats&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>" class="btn btn-secondary">Stats</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </div>
          </th>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php for ($i=1; $i < sectionTech()+1 ; $i++) { ?>
    <a href="/?page=liste-technique&section=<?= $i ?>" class="btn btn-info"><?= $i ?></a>
  <?php } ?>
