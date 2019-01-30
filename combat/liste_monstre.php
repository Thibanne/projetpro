<!-- "boutton" renvoyant à la page de combat correspondant a sa valeur -->
<div class="row align-center">
  <form id="listMonstre" action="?page=combat" method="post">
    <div class="col listingBattleMonster">
      <?php foreach (listeMonstre() as $key => $monstre) {
        if($monstre['Nom'] == 'Votre ombre'){ ?>
          <div class="form-group">
            <input type="submit" name="combat" value="???" title="<?= $monstre['Description'] ?>" class="btn btn-secondary form-control" />
          </div>
        <?php } else { ?>
          <div class="form-group">
            <input type="submit" name="combat" value="<?= $monstre['Nom'] ?>" title="<?= $monstre['Description'] ?>" class="btn btn-secondary form-control" />
          </div>
        <?php }
       } ?>
    </div>
  </form>
</div>
