<?php
// Recherche des techniques utilisable par le joueur
require 'combat/techniques.php';
// lors de l'entrée en combat
if(isset($_POST['combat'])){
  // Initialition du combat
  // mise en place des valeurs pour débuter un combat
  require 'combat/initCombat.php';
  $_SESSION['basePVmonster'] = $_SESSION['monstre']['PV'];
  $monsterName = strtolower($_SESSION['avec']);
  $monsterName = str_replace(' ', '-', $monsterName);
  header('Location: ?page=combat&'.$monsterName);
}
// Je verifie si je suis en combat
if(isset($_SESSION['battleIn'])){
  // je verifie qu'un pouvoir a été selectionné ET que ni moi ni le monstre ne soyons à 0 PV
  if(isset($_POST['skill']) and ($_SESSION['monstre']['PV'] > 0 and $_SESSION['joueur']['PV'] > 0)){
    // j'incremente 1 au nombre de tour de combat
    $_SESSION['tour']=$_SESSION['tour']+1;
    $_SESSION['journaldecombat'][$_SESSION['tour']-1][]='Tour '.$_SESSION['tour'];
    // quand je declare une attaque
    // je verifie que le joueur n'a pas une valeur de 'stun' de 1 ou plus
    if($_SESSION['joueur']['stun'] > 0){
      // je décrémente de 1 la valeur 'stun' du joueur
      $_SESSION['joueur']['stun'] -= 1;
      // j'affiche
      jdc('Vous êtes assomé !');
    }else{
      // Effectue l'action demandé
      require 'combat/actionJoueur.php';
    }
    // quand le monstre declare une attaque
    // je verifie que le monstre n'a pas une valeur de 'stun' de 1 ou plus
    if($_SESSION['monstre']['stun'] > 0){
      // je décrémente de 1 la valeur 'stun' du monstre
      $_SESSION['monstre']['stun'] -= 1;
      // j'affiche
      jdc($_SESSION['avec'].' est assomé !');
    }else{
      // Effectue l'action demandé
      require 'combat/actionMonstre.php';
    }
  }
  // Si les PV du monstre ou ceux du jour tombe a 0 j'affiche un modal
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
