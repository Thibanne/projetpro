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
    'mana' => 0,
    'stun' => 0
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
    'mana' => 20,
    'stun' => 0
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
}else if($_POST['combat']=='Hobgobelin'){
  $_SESSION['battleIn']=true;
  $_SESSION['avec']=$_POST['combat'];
  $_SESSION['monstre'] = [
    'PV' => 75,
    'mana' => 20,
    'stun' => 0
  ];
  $_SESSION['techMonstre'] = [
    'Attaque' => [
      'degats' => ['PV' => -5],
      'cout' => ['mana' => 0]
    ],
    'Coup bas' => [
      'degats' => ['PV' => -30],
      'cout' => ['mana' => -10]
    ]
  ];
}else if($_POST['combat']=='Ogre'){
  $_SESSION['battleIn']=true;
  $_SESSION['avec']=$_POST['combat'];
  $_SESSION['monstre'] = [
    'PV' => 150,
    'mana' => 10,
    'stun' => 0
  ];
  $_SESSION['techMonstre'] = [
    'Attaque' => [
      'degats' => ['PV' => -15],
      'cout' => ['mana' => 0]
    ],
    'Martellage' => [
      'degats' => ['PV' => -30],
      'cout' => ['mana' => -10]
    ],
    'Plaquage' => [
      'degats' => [
        'PV' => -25,
        'stun' => 1
      ],
      'cout' => ['mana' => -10]
    ]
  ];
}else if($_POST['combat']=='???'){
  $_SESSION['battleIn']=true;
  $_SESSION['avec']='Votre ombre';
  $_SESSION['monstre'] = [
    'PV' => 200,
    'mana' => 100,
    'stun' => 0
  ];
  $_SESSION['techMonstre'] = [
    'Attaque' => [
      'degats' => ['PV' => -10],
      'cout' => ['mana' => 0]
    ],
    'Coup fort' => [
      'degats' => ['PV' => -20],
      'cout' => ['mana' => -10]
    ],
    'Coup assomant' => [
      'degats' => [
        'PV' => -10,
        'stun' => 1
      ],
      'cout' => ['mana' => -10]
    ],
    'Boule de feu' => [
      'degats' => ['PV' => -30],
      'cout' => ['mana' => -20]
    ],
    'Soin' => [
      'degats' => ['PV' => 20],
      'cout' => ['mana' => -10]
    ]
  ];
}
$_SESSION['basePVjoueur'] = $_SESSION['joueur']['PV'];
$_SESSION['baseManajoueur'] = $_SESSION['joueur']['mana'];
$_SESSION['basePVmonstre'] = $_SESSION['monstre']['PV'];
 ?>
