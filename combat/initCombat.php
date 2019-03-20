<?php
// initialisation des tours de combat
$_SESSION['tour']=0;
// je vide le journal de combat
$_SESSION['journaldecombat']=[];
$_SESSION['battleIn']=true;
// je verifie si le nom du monstre est '???' pour modifier ensuite son nom dans la fenêtre de combat
if($_POST['combat']=='???'){
  $_SESSION['avec']='Votre ombre';
}else{
  $_SESSION['avec']=$_POST['combat'];
}
// J'écrase d'éventuelle donnée d'un ancien monstre  
$_SESSION['monstre'] = [];
// je récupère le nom et les valeurs du monstre
$statsMonstre = showMonstre($_POST['id']);
// j'initialise le monstre avec ses nouvelles données
foreach ($statsMonstre as $key => $value) {
  $_SESSION['monstre'][$value['Nom']] = $value['valeur'];
}
$_SESSION['techMonstre'] = [];
$techMonstre = techMonstre($_POST['id']);
foreach ($techMonstre as $key => $value) {
  if($value['action'] == 'Degat'){
    $_SESSION['techMonstre'][$value['nomTech']]['Degat'][$value['statNom']] = $value['valeurTech'];
  }else if($value['action'] == 'Cout'){
    $_SESSION['techMonstre'][$value['nomTech']]['Cout'][$value['statNom']] = $value['valeurTech'];
  }
}
// l'initialisation du joueur étant pré-établi lors de la connexion
// enregistrement des valeurs de stats d'origine du joueur et monstre pour les barre de vie et mana
// $_SESSION['basePVjoueur'] = $_SESSION['joueur']['PV'];
// $_SESSION['baseManajoueur'] = $_SESSION['joueur']['mana'];
// $_SESSION['basePVmonstre'] = $_SESSION['monstre']['PV'];
 ?>
