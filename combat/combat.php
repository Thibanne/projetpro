<?php
require 'combat/techniques.php';
if(isset($_POST['combat'])){
  require 'combat/initCombat.php';
  $_SESSION['basePVmonster'] = $_SESSION['monstre']['PV'];
  $monsterName = strtolower($_SESSION['avec']);
  $monsterName = str_replace(' ', '-', $monsterName);
  header('Location: ?page=combat&'.$monsterName);
}
if(isset($_SESSION['battleIn'])){
  if(isset($_POST['skill']) and ($_SESSION['monstre']['PV'] > 0 and $_SESSION['joueur']['PV'] > 0)){
    // j'incremente 1 au nombre de tour de combat
    $_SESSION['tour']=$_SESSION['tour']+1;
    $_SESSION['journaldecombat'][$_SESSION['tour']-1][]='Tour '.$_SESSION['tour'];
    // quand je declare une attaque
    if($_SESSION['joueur']['stun'] > 0){
      $_SESSION['joueur']['stun'] -= 1;
      jdc('Vous êtes assomé !');
    }else{
      require 'combat/actionJoueur.php';
    }
    if($_SESSION['monstre']['stun'] > 0){
      $_SESSION['monstre']['stun'] -= 1;
      jdc($_SESSION['avec'].' est assomé !');
    }else{
      require 'combat/actionMonstre.php';
    }
  }
  if($_SESSION['monstre']['PV'] <= 0){
    victoryModal('Victoire', 'est vaincu !');
  }else if($_SESSION['joueur']['PV'] <= 0){
    victoryModal('Defaite', 'vous a vaincu !');
  }
  // Affichage des statistiques joueur et monstres
  require 'combat/journaldecombat.php';
// sinon je renvoi sur la page de selection
} else {
  header('Location:http://projetpro/');
}
?>
