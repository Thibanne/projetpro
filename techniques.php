<?php
// liste des choix utilisable par le joueur et l'IA ainsi que leur effet
$technique = [
  // Valeur pour celui qui subit l'attaque
  'defenseur' => [
    'Coup fort' => [
      'PV' => -20,
      'mana' => 0
    ],
    'Coup assomant' => [
      'PV' => -10,
      'mana' => 0,
      'tour_inactif' => 1
    ],
    'Boule de feu' => [
      'PV' => -30,
      'mana' => 0
    ],
    'Soin' => [
      'PV' => 0,
      'mana' => 0
    ]
  ],
  // Valeur pour celui qui inflige l'attaque
  'attaquant' => [
    'Coup fort' => [
      'PV' => 0,
      'mana' => -10
    ],
    'Coup assomant' => [
      'PV' => 0,
      'mana' => -10
    ],
    'Boule de feu' => [
      'PV' => 0,
      'mana' => -20
    ],
    'Soin' => [
      'PV' => 20,
      'mana' => -10
    ]
  ]
];
 ?>
