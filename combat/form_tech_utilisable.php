<!-- Liste des actions utilisable en combat -->
<form class="" action="" method="post">
  <?php
  foreach ($techJoueur as $key => $value) {
    if(abs($value['cout']['mana']) <= $_SESSION['joueur']['mana']){
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $key ?>" title="<?= descriptionSkill($key ,$value) ?>" />
      </div>
      <?php
    }else{
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $key ?>" title="Pas assez de mana !" disabled />
      </div>
      <?php
    }
  }
  ?>
  <div class="skillButton">
    <a href="/">Fuite</a>
  </div>
</form>
