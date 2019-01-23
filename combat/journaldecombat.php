<div class="row statsBar">
  <div class="col">
    <p><strong><?= $_SESSION['pseudo'] ?></strong></p>
    <div class="skillbar  " data-percent="<?= playerPVPercent() ?>%">
      <div class="skillbar-title"><span>PV</span></div>
      <div class="skillbar-bar skillbar-playerPV"></div>
      <div class="skill-bar-percent"><?= $_SESSION['joueur']['PV'] ?></div>
    </div>
    <div class="skillbar clearfix " data-percent="<?= playerManaPercent() ?>%">
      <div class="skillbar-title"><span>Mana</span></div>
      <div class="skillbar-bar skillbar-playerMana"></div>
      <div class="skill-bar-percent"><?= $_SESSION['joueur']['mana'] ?></div>
    </div>
  </div>
  <div class="col">
    <p><strong><?= $_SESSION['avec'] ?></strong></p>
    <div class="skillbar clearfix " data-percent="<?= monsterPVPercent() ?>%">
      <div class="skillbar-title"><span>PV</span></div>
      <div class="skillbar-bar skillbar-monsterPV"></div>
      <div class="skill-bar-percent"><?= $_SESSION['monstre']['PV'] ?></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-2">
    <?php require('form_tech_utilisable.php'); ?>
  </div>
  <div class="col">
    <?php
    // Inversement du sens d'ecriture de la boucle
    krsort($_SESSION['journaldecombat']);
    // Journal enregistré sous forme de "tour"
    ?>
    <div id="jdc">
      <?php
        foreach ($_SESSION['journaldecombat'] as $key1 => $value1) {
          // Actions effectuer durant le tour précédent
          ?> <div class="jdcTour"> <?php            
          foreach ($value1 as $key => $value) {
            ?><p><?= $value ?></p><?php
          }
          ?></div><?php
        }
      ?>
    </div>
  </div>
</div>
