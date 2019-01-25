<!-- "boutton" renvoyant à la page de combat correspondant a sa valeur -->
<div class="row align-center">
  <form id="listMonstre" action="?page=combat" method="post">
    <div class="col">
      <?php foreach (listeMonstre() as $key => $monstre) { ?>
          <div class="form-group">
            <input class="btn btn-secondary form-control" type="submit" name="combat" value="<?= $monstre['Nom'] ?>" />
          </div>
      <?php } ?>
    </div>
  </form>
</div>
