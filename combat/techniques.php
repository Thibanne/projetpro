<?php
// liste des choix utilisable par le joueur ainsi que leur effet
$techJoueur = [
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


?>
