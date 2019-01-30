<?php
$connect = con();
// Stats
if(isset($_POST['del'])) {
    $deletequery = "DELETE FROM `Stats` WHERE `id` = $_POST[id]";
    $connect->query($deletequery);
}
?>
<div class="col align-self-center">
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
            <td>Valeur des <strong>P</strong>oint de <strong>V</strong>ie</td>
          <?php }else if($value['Nom'] == 'mana'){ ?>
            <td>Valeur des point de <strong>mana</strong> pour les pouvoirs</td>
          <?php }else if($value['Nom'] == 'stun'){ ?>
            <td>Valeur du temps sans pouvoir agir</td>
          <?php } ?>
          <th>
            <a href="/?page=modify-stats&id=<?= $value['id'] ?>" class="btn btn-secondary">Modifier</a>
            <form class="d-inline" action="" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn btn-warning" type="submit" name="del">Supprimer</button>
            </form>
          </th>
        <?php } ?>
      </tr>
    </tbody>
  </table>
  <a href="/?page=creer-stats" class="btn btn-secondary">Créer nouvelle statistique</a>
</div>
