<?php
// je vérifie que le pouvoir coûte moins que la valeur de mana actuel du joueur
if(abs($techJoueur[$_POST['skill']]['cout']['mana']) <= $_SESSION['joueur']['mana']){
  // Je verifie le type d'attaque
  // si c'est l'attaque de base
  if($_POST['skill']=='Attaque'){
    // je fais le calcul des dommages fait au monstre
    $_SESSION['monstre']['PV']+=$techJoueur[$_POST['skill']]['degats']['PV'];
    // affichage des actions effectuer durant le tour du joueur
    jdc('Vous avez attaqué normalement et avez infligé '.abs($techJoueur[$_POST['skill']]['degats']['PV']).' dégats');
  // dans le cas d'un soin
  }else if($_POST['skill']=='Soin'){
    $lifePoint = $_SESSION['joueur']['PV']+$techJoueur['Soin']['degats']['PV'];
    if($lifePoint>$_SESSION['basePVjoueur']){
      $_SESSION['joueur']['PV']=$_SESSION['basePVjoueur'];
    }else{
      $_SESSION['joueur']['PV']+=$techJoueur['Soin']['degats']['PV'];
    }
    $_SESSION['joueur']['mana']+=$techJoueur['Soin']['cout']['mana'];
    jdc('Vous avez utilisé soin et vous vous êtes soigné de '.abs($techJoueur['Soin']['degats']['PV']).' PV');
  // dans le cas du coup assomant
  }else if($_POST['skill']=='Coup assomant'){
    $_SESSION['monstre']['PV']+=$techJoueur[$_POST['skill']]['degats']['PV'];
    $_SESSION['monstre']['stun']+=$techJoueur[$_POST['skill']]['degats']['stun'];
    $_SESSION['joueur']['mana']+=$techJoueur[$_POST['skill']]['cout']['mana'];
    jdc('Vous avez attaqué avec '.$_POST['skill'].' et vous avez infligé '.abs($techJoueur[$_POST['skill']]['degats']['PV']).' de dégats et avez assomé '.$_SESSION['avec'].' pendant '.$techJoueur[$_POST['skill']]['degats']['stun'].' tour(s)');
  // Dans tout les autres cas
  }else{
    $_SESSION['monstre']['PV']+=$techJoueur[$_POST['skill']]['degats']['PV'];
    $_SESSION['joueur']['mana']+=$techJoueur[$_POST['skill']]['cout']['mana'];
    jdc('Vous avez attaqué avec '.$_POST['skill'].' et vous avez infligé '.abs($techJoueur[$_POST['skill']]['degats']['PV']).' dégats à '.$_SESSION['avec']);
  }
// Si l'on tente de changer sa valeur de mana manuelement
}else{
  jdc('Vous avez triché, vous passez votre tour');
}
?>
