<!-- Liste des actions utilisable en combat -->
<form class="" action="" method="post">
  <div class="">
    <input type="submit" name="skill" value="Attaque" />
  </div>
  <?php
  foreach ($techJoueur as $key => $value) {
    if(abs($value['cout']['mana']) <= $_SESSION['joueur']['mana']){
      ?>
      <div class="">
        <input type="submit" name="skill" value="<?= $key ?>" />
      </div>
      <?php
    }else{
      ?>
      <div class="">
        <input type="submit" name="skill" value="<?= $key ?>" disabled />
      </div>
      <?php
    }
  }
  ?>
</form>
