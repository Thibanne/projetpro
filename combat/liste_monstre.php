<!-- "boutton" renvoyant à la page de combat correspondant a sa valeur -->
<div class="row align-center">
      <?php foreach (listeMonstre() as $key => $monstre) { ?>
        <form id="listMonstre" class="col-12" action="?page=combat" method="post">
        <div class="col listingBattleMonster">
        <?php if($monstre['Nom'] == 'Votre ombre'){ ?>
          <div class="form-group">
            <input type="submit" name="combat" value="???" title="<?= $monstre['Description'] ?>" class="btn btn-secondary form-control" />
          </div>
          <div class="form-group d-none">
            <input type="text" name="id" value="<?= $monstre['id'] ?>" />
          </div>
        <?php } else { ?>
          <div class="form-group">
            <input type="submit" name="combat" value="<?= $monstre['Nom'] ?>" title="<?= $monstre['Description'] ?>" class="btn btn-secondary form-control" />
          </div>
          <div class="form-group d-none">
            <input type="text" name="id" value="<?= $monstre['id'] ?>" />
          </div>
        <?php } ?>
        </div>
        </form>
       <?php } ?>
</div>
