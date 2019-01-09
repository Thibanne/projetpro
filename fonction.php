<?php

function jdc($journaldecombat){
  $_SESSION['journaldecombat'][$_SESSION['tour']-1][] = $journaldecombat;
}

function subit_Attaque($personne1, $stat1, $personne2, $stat2){
  $_SESSION[$personne1][$stat1]=$_SESSION[$personne1][$stat1]+$_SESSION[$personne2][$stat2];
  // affichage des actions effectuer durant le tour du monstre
  if( $personne1 == 'joueur'){
    jdc($_SESSION['avec'].' vous a attaqué et vous avez subit '.abs($_SESSION[$personne2][$stat2]).' dégats');
  }else{
    jdc('Vous avez attaqué normalement et avez infligé '.abs($_SESSION[$personne2][$stat2]).' dégats');
  }
}

function subit_soin($personne1, $stat1, $donneSoin){
  $_SESSION[$personne1][$stat1]=$_SESSION[$personne1][$stat1]+$donneSoin;
  // affichage des actions effectuer durant le tour du monstre
  if( $personne1 != 'joueur'){
    jdc($_SESSION['avec'].' a utilisé soin et s\'est soigné de '.abs($donneSoin).' PV');
  }else{
    jdc('Vous avez utilisé soin et vous vous êtes soigné de '.abs($donneSoin).' PV');
  }
}

function subit_attaqueRandom($personne1, $stat1, $donneDegat, $skill){
  $_SESSION[$personne1][$stat1]=$_SESSION[$personne1][$stat1]+$donneDegat;
  // affichage des actions effectuer durant le tour du monstre
  if( $personne1 == 'joueur'){
    jdc($_SESSION['avec'].' vous a attaqué avec '.$skill.' et vous avez subit '.abs($donneDegat).' dégats');
  }else{
    jdc('Vous avez attaqué avec '.$skill.' et vous avez infligé '.abs($donneDegat).' dégats à '.$_SESSION['avec']);
  }

}

function randAttaque(){
  // Les attaque disponibles
  $skill = [
    'Attaque',
    'Coup fort',
    'Coup assomant',
    'Boule de feu',
    'Soin'
  ];
  // je mélange
  shuffle($skill);
  return $skill[0];
}
?>
