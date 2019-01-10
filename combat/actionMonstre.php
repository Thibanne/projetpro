<?php
// Condition pour savoir si le monstre a suffisament de mana pour utiliser un pouvoir

  $copie = [];
  foreach ($_SESSION['techMonstre'] as $key => $value) {
    if(abs($value['cout']['mana']) <= $_SESSION['monstre']['mana']){
      $copie[] = $key;
    }
  }
  $skill=$copie;
  // ?><pre><?php
  // print_r($skill);
  // ?></pre><?php

  // $skill=array_keys($_SESSION['techMonstre']);

shuffle($skill);
$degat=$_SESSION['techMonstre'][$skill[0]]['degats']['PV'];
$cout=$_SESSION['techMonstre'][$skill[0]]['cout']['mana'];
// je lui dit d'agir
// selon son attaque je prepare des exeptions
// S'il attaque normalement
if($skill[0]=='Attaque'){
  // la fonction fait que les PV du joueur sont retiré de l'attaque du monstre
  $_SESSION['joueur']['PV']+=$degat;
  jdc($_SESSION['avec'].' vous a attaqué et vous avez subit '.abs($degat).' dégats');
// s'il fait un soin
}else if($skill[0]=='Soin'){
  // J'affecte à la variable la valeur de la $technique soin
  $_SESSION['monstre']['PV']+=$degat;
  $_SESSION['monstre']['mana']+=$cout;
  // la fonction fait que les PV du monstre sont ajouter a la valeur de la variable
  jdc($_SESSION['avec'].' a utilisé soin et s\'est soigné de '.abs($degat).' PV');
// Si ce n'est ni une attaque normale ni un soin
}else{
  // J'affecte à la variable la valeur de la $technique aléatoire
  $_SESSION['joueur']['PV']+=$degat;
  $_SESSION['monstre']['mana']+=$cout;
  // la fonction fait que les PV du joueur sont retiré de la valeur de la $technique aléatoire
  jdc($_SESSION['avec'].' vous a attaqué avec '.$skill[0].' et vous avez subit '.abs($degat).' dégats');
}
?>
