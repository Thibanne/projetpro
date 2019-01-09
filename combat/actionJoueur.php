<?php
// Je verifie le type d'attaque
if($_POST['skill']=='Attaque'){
  // je fais le calcul des dommages fait au monstre
  $_SESSION['monstre']['PV']+=$_SESSION['joueur']['attaque'];
  // affichage des actions effectuer durant le tour du joueur
  jdc('Vous avez attaqué normalement et avez infligé '.abs($_SESSION['joueur']['attaque']).' dégats');
}else if($_POST['skill']=='Soin'){
  $_SESSION['joueur']['PV']+=$techJoueur['Soin']['degats']['PV'];
  $_SESSION['joueur']['mana']+=$techJoueur['Soin']['cout']['mana'];
  jdc('Vous avez utilisé soin et vous vous êtes soigné de '.abs($techJoueur['Soin']['degats']['PV']).' PV');
}else{
  $_SESSION['monstre']['PV']+=$techJoueur[$_POST['skill']]['degats']['PV'];
  $_SESSION['joueur']['mana']+=$techJoueur[$_POST['skill']]['cout']['mana'];
  jdc('Vous avez attaqué avec '.$_POST['skill'].' et vous avez infligé '.abs($techJoueur[$_POST['skill']]['degats']['PV']).' dégats à '.$_SESSION['avec']);
}
?>
