<?php

?>
<!-- Liste des actions utilisable en combat -->
<form class="" action="" method="post">
  <?php
  foreach (techJoueur($_SESSION['id']) as $key => $tech) {
    if(abs(techCout($tech['id'], 'mana')[0]['Valeur']) <= $_SESSION['joueur']['mana']){
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $tech['Nom'] ?>" title="<?= $tech['Description'] ?>" />
      </div>
      <?php
    }else{
      ?>
      <div class="skillButton">
        <input type="submit" name="skill" value="<?= $tech['Nom'] ?>" title="Pas assez de mana !" disabled />
      </div>
      <?php
    }
  }
  ?>
  <div class="skillButton">
    <a href="/">Fuite</a>
  </div>
</form>
