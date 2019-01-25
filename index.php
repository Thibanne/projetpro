<?php session_start();
require 'config.php';
require 'app/fonction.php';
require 'app/modeleMonstre.php';
require 'app/modeleTech.php';
// Avec session_start() je récupère les données enregistré dans une valeur ID unique, ou j'en génère une vide
// je vérifie et je valide le formulaire de connection
// S'il se deconnecte je vide la session
if(isset($_GET['logout'])){
  $_SESSION = [];
  header('Location: /');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <?php
  if(isset($_GET['page'])){
    if($_GET['page'] == 'combat'){
      ?>
        <link rel="stylesheet" href="assets/css/combat.css" />
        <link rel="stylesheet" href="assets/css/stats.css" />
        <link rel="stylesheet" href="assets/css/boutonDeCombat.css" />
      <?php
      if(isset($_GET['votre-ombre'])){
        ?><link rel="stylesheet" href="assets/css/ombre.css" /><?php
      }
    }
  }
   ?>
  <title>GOHO?</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-between">
      <?php
      if(isset($_GET['page']) && $_GET['page'] != 'combat'){
        require 'site/navbar.php';
      }else if(!isset($_GET['page'])){
        require 'site/navbar.php';
      }
      ?>
    </div>
    <?php
    if(isConnected()){
      if(isset($_GET['page'])){
        if($_GET['page'] == 'combat'){
          require 'combat/combat.php';
        }else if($_GET['page'] == 'liste-monstre'){
          require urlAdminListe.'listeMonstre.php';
        }else if($_GET['page'] == 'creer-stats'){
          require urlAdminCreer.'formCreateStats.php';
        }else if($_GET['page'] == 'creer-technique'){
          require urlAdminCreer.'formCreateTechnique.php';
        }else if($_GET['page'] == 'listetech'){
          require urlAdminListe.'listetech.php';
        }else if($_GET['page'] == 'cree-statsTech'){
          require urlAdminCreer.'createStatsTech.php';
        }else if($_GET['page'] == 'creer-techjoueur'){
          require urlAdminCreer.'createTechJoueur.php';
        }else if($_GET['page'] == 'creer-techmonstre'){
          require urlAdminCreer.'createTechMonstre.php';
        }else if($_GET['page'] == 'profilMonstre'){
          require urlAdminProfil.'profilMonstre.php';
        }else if($_GET['page'] == 'creer-Monstre'){
          require urlAdminCreer.'formCreateMonstre.php';
        }
      }else{
        require 'combat/liste_monstre.php';
        resetJoueur();
      }
    }else{
      ?> <p> Pas connecté </p> <?php
    }
    ?>
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/fonction.js"></script>
    <script>
    $('#victoryModal').modal({
      show : true,
      keyboard : false,
      backdrop : 'static'
    });
    <?php if (isset($_GET['modal'])){ ?>
      $('#connectModal').modal('show');
    <?php } ?>
    </script>
    <script>
    <?php if($_SESSION['tour'] == 0){ ?>
      $('.skillbar').each(function(){
        var result = reducteurPX(this, 54, $(this).attr('data-percent'));

        $(this).find('.skillbar-bar').animate({
          // je lui donne le resultat pour l'animation
          width:result+'px'
        },1000);
      });
    <?php
    $_SESSION['tempPVJoueur'] = playerPVPercent();
    $_SESSION['tempMana'] = playerManaPercent();
    $_SESSION['tempPVMonstre'] = monsterPVPercent();
    }else{ ?>
      $('.skillbar').each(function(){
        var ancienPVJoueur = reducteurPX(this, 54, "<?= $_SESSION['tempPVJoueur'] ?>%");
        var ancienManaJoueur = reducteurPX(this, 54, "<?= $_SESSION['tempMana'] ?>%");
        var ancienPVMonstre = reducteurPX(this, 54, "<?= $_SESSION['tempPVMonstre'] ?>%");
        var resultActuel = reducteurPX(this, 54, $(this).attr('data-percent'));
        $(this).find('.skillbar-playerPV').css("width", ancienPVJoueur)
        $(this).find('.skillbar-playerMana').css("width", ancienManaJoueur)
        $(this).find('.skillbar-monsterPV').css("width", ancienPVMonstre)
        $(this).find('.skillbar-bar').animate({
          width:resultActuel+'px'
        },0500);
      });
    <?php
    $_SESSION['tempPVJoueur'] = playerPVPercent();
    $_SESSION['tempMana'] = playerManaPercent();
    $_SESSION['tempPVMonstre'] = monsterPVPercent();
    } ?>
    </script>

  </body>
  </html>
