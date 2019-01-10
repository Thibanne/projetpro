<?php session_start();
// Avec session_start() je récupère les données enregistré dans une valeur ID unique, ou j'en génère une vide
// je vérifie et je valide le formulaire de connection
  if(isset($_POST['login'],$_POST['password'])){
    // Je verifie si le "login" ecrit existe dans la base de donnée
    if($_POST['login']=='elsa'){
      // s'il existe je mémorise le fait qu'il est connecté
      $_SESSION['pseudo'] = $_POST['login'];
      $_SESSION['joueur'] = [
        'PV' => 100,
        'mana' => 100,
        'attaque' => -10
      ];
    }
  }
  // S'il se deconnecte je vide la session
  if(isset($_POST['logout'])){
    $_SESSION = [];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>pasdenom</title>
</head>
<body>
  <?php
  // j'affiche la page de session si connecté
  if(isset($_SESSION['pseudo'])){
    if(isset($_GET['page'])){
      require 'combat/combat.php';
    }else{
      echo 'Vous êtes connecté';
      require 'logout.php';
      require 'liste_monstre.php';
    }
  // sinon j'affiche  un formulaire de connection
  } else {
    require 'form.php';
  }
   ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
