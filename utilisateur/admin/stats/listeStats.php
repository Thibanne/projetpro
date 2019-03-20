<?php
$connect = con();
// Stats
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `Stats` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
  <a href="/?page=creer-stats" class="btn btn-secondary">Créer nouvelle statistique</a>
  <table class="table table-striped listTableBackground">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Description</th>
        <th class="tableActionStats">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(listeStats() as $key => $value){ ?>
        <tr>
          <th><?= $value['id'] ?></th>
          <th><?= $value['Nom'] ?></th>
          <?php if($value['Nom'] == 'PV'){ ?>
            <td class="max-width-description">Valeur des <strong>P</strong>oint de <strong>V</strong>ie</td>
          <?php }else if($value['Nom'] == 'mana'){ ?>
            <td class="max-width-description">Valeur des point de <strong>mana</strong> pour les pouvoirs</td>
          <?php }else if($value['Nom'] == 'stun'){ ?>
            <td class="max-width-description">Valeur du temps sans pouvoir agir</td>
          <?php } ?>
          <th>
            <div class="dropdown d-md-none">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu background-dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/?page=modify-stats&id=<?= $value['id'] ?>">Modifier</a>
                <form class="dropdown-item" action="" method="post">
                  <input type="hidden" name="id" value="<?= $value['id'] ?>">
                  <button class="btn btn-link textLikeLink" type="submit" name="del">Supprimer</button>
              </form>
              </div>
            </div>
            <div class="dropdown d-none d-md-block">
              <a href="/?page=modify-stats&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
              <form class="d-inline" action="" method="post">
                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
              </form>
            </div>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
