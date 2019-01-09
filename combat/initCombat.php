<?php
$_SESSION['tour']=0;
$_SESSION['journaldecombat']=[];
// je verifie en fonction de la valeur du combat selectionné
if( $_POST['combat']=='Gobelin'){
  // Je mémorise le fait d'être en combat
  $_SESSION['battleIn']=true;
  // je mémorise en fonction du nom du monstre avec qui je suis en combat
  $_SESSION['avec']=$_POST['combat'];
  // je mémorise les statistiques du monstre en question
  $_SESSION['monstre'] = [
    'PV' => 50,
    'mana' => 0
  ];
  $_SESSION['techMonstre'] = [
    'Attaque' => [
      'degats' => ['PV' => -5],
      'cout' => ['mana' => 0]
    ]
  ];
}else if($_POST['combat']=='Orc'){
  $_SESSION['battleIn']=true;
  $_SESSION['avec']=$_POST['combat'];
  $_SESSION['monstre'] = [
    'PV' => 75,
    'mana' => 20
  ];
  $_SESSION['techMonstre'] = [
    'Attaque' => [
      'degats' => ['PV' => -5],
      'cout' => ['mana' => 0]
    ],
    'Coup bourrin' => [
      'degats' => ['PV' => -20],
      'cout' => ['mana' => -10]
    ],
    'Grosse baffe' => [
      'degats' => ['PV' => -10],
      'cout' => ['mana' => -5]
    ]
  ];
}
 ?>
