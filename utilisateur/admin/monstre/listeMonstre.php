<?php
// connection à la base de donnée
$connect = con();
// Monstre
// Si l'on appuie sur suppr
if(isset($_POST['del'])) {
  // on supprime le monstre selon la valeur de son 'id'
    $deletequery = "DELETE FROM `Monstre` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <a href="/?page=creer-monstre" class="btn btn-secondary">Créer nouveau monstre</a>
  <!-- <a href="/?page=creer-monstreFull" class="btn btn-secondary">Créer nouveau monstre de A à Z</a> -->
  <table class="table table-striped listTableBackground">
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
          <td class="max-width-description">
            <div>
              <div style="min-width: 350px;">
                <?= $value['Description'] ?>
              </div>
            </div>
          </td>
          <th>
            <div class="dropdown d-md-none">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu background-dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/?page=modify-monstre&id=<?= $value['id'] ?>">Modifier</a>
                <a class="dropdown-item" href="/?page=liste-techMonstre&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>">Technique</a>
                <a class="dropdown-item" href="/?page=liste-monstreStats&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>">Stats</a>
                <form class="dropdown-item" action="" method="post">
                  <input type="hidden" name="id" value="<?= $value['id'] ?>">
                  <button class="btn btn-link textLikeLink" type="submit" name="del">Supprimer</button>
                </form>
              </div>
            </div>
            <div class="dropdown d-none d-md-block">
              <a href="/?page=modify-monstre&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
              <a href="/?page=liste-techMonstre&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>" class="btn btn-secondary">Technique</a>
              <a href="/?page=liste-monstreStats&id=<?= $value['id'] ?>&nom=<?= $value['Nom'] ?>" class="btn btn-secondary">Stats</a>
              <form class="d-inline" action="" method="post">
                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                <button class="btn btn-warning" type="submit" name="del">X</button>
              </form>
            </div>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
