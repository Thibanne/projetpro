<?php session_start();
require '../techniques.php';
require '../fonction.php';
if(isset($_POST['combat'])){
  require 'initCombat.php';
}
if(isset($_SESSION['battleIn'])){
  if(isset($_POST['skill'])){
    // j'incremente 1 au nombre de tour de combat
    $_SESSION['tour']=$_SESSION['tour']+1;
    $_SESSION['journaldecombat'][$_SESSION['tour']-1][]='Tour '.$_SESSION['tour'];
    // quand je declare une attaque
    require 'actionJoueur.php';
    require 'actionMonstre.php';
  }
  // Affichage des statistiques joueur et monstres
  require 'journaldecombat.php';
// sinon je renvoi sur la page de selection
} else {
  header('Location:http://projetpro/');
}
?>
