<?php
echo 'Vous avez '.$_SESSION['joueur']['PV'].' PV et '.$_SESSION['joueur']['mana'].' mana<br />';
echo 'Vous combattez '.$_SESSION['avec']. ' qui a '.  $_SESSION['monstre']['PV'].' PV<br />';
require('form_tech_utilisable.php');
// Inversement du sens d'ecriture de la boucle
krsort($_SESSION['journaldecombat']);
// Journal enregistré sous forme de "tour"
foreach ($_SESSION['journaldecombat'] as $key1 => $value1) {
  // Actions effectuer durant le tour précédent
  foreach ($value1 as $key => $value) {
    echo $value.'<br />';
  }
}
 ?>
