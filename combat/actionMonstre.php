<?php
// Condition pour savoir si le monstre a suffisament de mana pour utiliser un pouvoir
$copie = [];
// echo '<pre>'.$key.' ';
// print_r($_SESSION['techMonstre']);
// echo '</pre>';
// exit;
foreach ($_SESSION['techMonstre'] as $key => $value) {
  if(abs($value['Cout']['mana']) <= $_SESSION['monstre']['mana']){
    $copie[] = $key;
  }
}
$skill=$copie;
shuffle($skill);
$degat=$_SESSION['techMonstre'][$skill[0]]['Degat']['PV'];
$cout=$_SESSION['techMonstre'][$skill[0]]['Cout']['mana'];
// je lui dit d'agir
// selon son attaque je prepare des exeptions
// S'il attaque normalement
if($skill[0]=='Attaque'){
  // la fonction fait que les PV du joueur sont retiré de l'attaque du monstre
  $_SESSION['joueur']['PV']+=$degat;
  jdc($_SESSION['avec'].' vous a attaqué et vous avez subit '.abs($degat).' dégats');
// s'il fait un soin
}else if($skill[0]=='Soin'){
  $lifePoint = $_SESSION['monstre']['PV']+$degat;
  if($lifePoint>$_SESSION['basePVmonster']){
    $_SESSION['monstre']['PV']=$_SESSION['basePVmonster'];
  }else{
    // J'affecte à la variable la valeur de la $technique soin
    $_SESSION['monstre']['PV']+=$degat;
  }
  $_SESSION['monstre']['mana']+=$cout;
  // la fonction fait que les PV du monstre sont ajouter a la valeur de la variable
  jdc($_SESSION['avec'].' a utilisé soin et s\'est soigné de '.abs($degat).' PV');
// Si ce n'est ni une attaque normale ni un soin
}else if($skill[0]=='Coup assomant' or $skill[0]=='Plaquage'){
  $_SESSION['joueur']['PV']+=$degat;
  $_SESSION['joueur']['stun']+=$_SESSION['techMonstre'][$skill[0]]['Degat']['stun'];
  $_SESSION['monstre']['mana']+=$cout;
  jdc($_SESSION['avec'].' vous a attaqué avec '.$skill[0].' et vous avez subit '.abs($degat).' de dégats et vous a assomé pendant '.$_SESSION['techMonstre'][$skill[0]]['Degat']['stun'].' tour(s)');
}else{
  // J'affecte à la variable la valeur de la $technique aléatoire
  $_SESSION['joueur']['PV']+=$degat;
  $_SESSION['monstre']['mana']+=$cout;
  // la fonction fait que les PV du joueur sont retiré de la valeur de la $technique aléatoire
  jdc($_SESSION['avec'].' vous a attaqué avec '.$skill[0].' et vous avez subit '.abs($degat).' dégats');
}
?>
