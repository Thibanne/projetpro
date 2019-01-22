<div class="row statsBar">
  <div class="col">
    <p><strong><?= $_SESSION['pseudo'] ?></strong></p>
    <div class="skillbar clearfix " data-percent="<?= playerPVPercent() ?>%">
      <div class="skillbar-title" style="background: #444444;"><span>PV</span></div>
      <div class="skillbar-bar playerPV" style="background: #88cd2a;"></div>
      <div class="skill-bar-percent"><?= $_SESSION['joueur']['PV'] ?></div>
    </div>
    <div class="skillbar clearfix " data-percent="<?= playerManaPercent() ?>%">
      <div class="skillbar-title" style="background: #444444;"><span>Mana</span></div>
      <div class="skillbar-bar playerMana" style="background: #00a8ff;"></div>
      <div class="skill-bar-percent"><?= $_SESSION['joueur']['mana'] ?></div>
    </div>
  </div>
  <div class="col">
    <p><strong><?= $_SESSION['avec'] ?></strong></p>
    <div class="skillbar clearfix " data-percent="<?= monsterPVPercent() ?>%">
      <div class="skillbar-title" style="background: #444444;"><span>PV</span></div>
      <div class="skillbar-bar monsterPV" style="background: #DD1E2F;"></div>
      <div class="skill-bar-percent"><?= $_SESSION['monstre']['PV'] ?></div>
    </div>
  </div>
</div>
<?php
require('form_tech_utilisable.php');
// Inversement du sens d'ecriture de la boucle
krsort($_SESSION['journaldecombat']);
// Journal enregistré sous forme de "tour"
?> <div id="jdc"> <?php
foreach ($_SESSION['journaldecombat'] as $key1 => $value1) {
  // Actions effectuer durant le tour précédent
  foreach ($value1 as $key => $value) {
    ?><p><?= $value ?></p><?php
  }
}
?>
</div>
