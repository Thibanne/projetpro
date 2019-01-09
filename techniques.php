<?php
// liste des choix utilisable par le joueur et l'IA ainsi que leur effet
$techJoueur = [
  'Coup fort' => [
    'degats' => ['PV' => -20],
    'cout' => ['mana' => -10]
  ],
  'Coup assomant' => [
    'degats' => ['PV' => -10],
    'cout' => ['mana' => -10],
    'tour_inactif' => 1
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
