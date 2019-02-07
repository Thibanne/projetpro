<?php
$_SESSION['tour']=0;
$_SESSION['journaldecombat']=[];
// je verifie en fonction de la valeur du combat selectionné
$initCombat = $_POST['combat'];
if($_POST['combat']=='???'){
  $_SESSION['battleIn']=true;
  $_SESSION['avec']='Votre ombre';
  $_SESSION['monstre'] = [];
  $statsMonstre = showMonstre($_POST['id']);
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
}else{
  $_SESSION['battleIn']=true;
  $_SESSION['avec']=$_POST['combat'];
  $_SESSION['monstre'] = [];
  $statsMonstre = showMonstre($_POST['id']);
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
}
// echo '<pre>';
// print_r($initCombat);
// echo '</pre>';
// exit;
$_SESSION['basePVjoueur'] = $_SESSION['joueur']['PV'];
$_SESSION['baseManajoueur'] = $_SESSION['joueur']['mana'];
$_SESSION['basePVmonstre'] = $_SESSION['monstre']['PV'];
 ?>
