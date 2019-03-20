<?php session_start();
// Avec session_start() je récupère les données enregistré dans une valeur ID unique, ou j'en génère une vide
require 'config.php';
require 'app/fonction.php';
// $modelesFiles = autoRequireModele();

$Autoload = new AutoSearchFile('app', 'modele');
$modelesFiles = $Autoload->searchDirFiles();
foreach ($modelesFiles as $key => $value) {
  require 'app/'.$value;
}
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
  <link rel="stylesheet" href="/assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="/assets/css/jquery-ui.structure.css" />
  <link rel="stylesheet" href="/assets/css/jquery-ui.theme.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <?php
  if(isset($_GET['page'])){
    $tableStrPage = ['creer', 'liste', 'modify', 'profil'];
    if(findGetPage($tableStrPage)){
      ?><link rel="stylesheet" href="assets/css/BDD.css" /><?php
    }
    if($_GET['page'] == 'histoire'){
      ?><link rel="stylesheet" href="assets/css/histoire.css" /><?php
    }
    if($_GET['page'] == 'lieu-0'){
      ?><link rel="stylesheet" href="assets/css/lieu0.css" /><?php
    }
    if($_GET['page'] == 'lieu-1'){
      ?><link rel="stylesheet" href="assets/css/lieu1.css" /><?php
    }
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
  <?php require 'site/formulaireModal.php'; ?>
  <div id="body" class="container">
    <div class="row justify-content-between">
      <div class="offset-2">
        <?php
        if(isset($_GET['page'])
        && $_GET['page'] != 'combat'
        && $_GET['page'] != 'histoire'
        && strpos($_GET['page'],'lieu-') === false){
          require 'site/navbar.php';
          // mp3('musicAccueil','thème_accueil.mp3');
        }else if(!isset($_GET['page'])){
          require 'site/navbar.php';
          // mp3('musicAccueil','thème_accueil.mp3');
        }
        ?>
      </div>
    </div>
    <?php
    if(isConnected()){
      if(isset($_GET['page'])){
        if($_GET['page'] == 'combat'){
          require 'combat/combat.php';
          // Histoire
        }require 'site/page/pageHistoire.php';
        // Joueur
        //urlAdminJoueur
        // Monstre
        require 'site/page/pageMonstre.php';
        // Role
        //urlAdminRole
        // Stats
        require 'site/page/pageStats.php';
        // StatsJoueur
        require 'site/page/pageStatsJoueur.php';
        // StatsMonstre
        require 'site/page/pageStatsMonstre.php';
        // StatsTechnique
        require 'site/page/pageStatsTechnique.php';
        // TechniqueJoueur
        require 'site/page/pageTechniqueJoueur.php';
        // TechniqueMonstre
        require 'site/page/pageTechniqueMonstre.php';
        // Technique
        require 'site/page/pageTechnique.php';
      }else{
        require 'combat/liste_monstre.php';
        resetJoueur();
      }
    }else{
      ?>
      <div class="row justify-content-center">
        <div class="col-8">
          <?php require 'site/accueil.php'; ?>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/notify.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="assets/js/fonction.js"></script>
  <!-- musique -->
  <script>
  // if(isConnected()){
  //   musicAccueil.currentTime="12"
  // }
  </script>
  <!-- <script src="assets/js/effetpluie.js"></script> -->
  <!-- modals -->
  <?php if (isset($_GET['modal'])){ ?>
    <script src="assets/js/connectModal.js"></script>
  <?php }
  if(isset($_GET['page'])){
    $tableStrPage = ['creer', 'liste', 'modify', 'profil'];
    if(findGetPage($tableStrPage)){
      require 'assets/js/notifCRUD.php';
    }
    // barre de vie et mana + animation
    if($_GET['page'] == 'combat'){
      require 'assets/js/health-manaBar.php';
      ?> <script src="assets/js/victoryModal.js"></script>
    <?php }
    if($_GET['page'] == 'creer-monstreFull'){
      if(isset($_GET['id'])){ ?>
        <script>
          $("#createMonstreFullFormStep1").addClass('hidden');
          $("#createMonstreFullFormStep2").removeClass('hidden');
        </script>
    <?php };
     }
    // déplacement de carte + zoom
    if($_GET['page'] == 'histoire'){ ?>
      <script src="assets/js/worldmap.js"></script>
      <!-- remplacement d'image basse par haute qualité -->
      <script>
      $( function(){
        $("#worldmap-img").append('<img id="worldmap2" src="../assets/img/worldmap.png">')
        worldmap2.onload = function(){
          $("#worldmap-img").attr({src: "../assets/img/worldmap.png", alt: "map en haute qualité"});
          $("#worldmap2").remove();
        };
      });
      </script>
      <script>lieu0.onclick = function(){ window.location = '/?page=lieu-0'}</script>
      <?php if($_GET['l'] == '1'){ ?>
        <script>
        $("#lieu0").css("display", "none");
        $("#lieu1").css("display", "block");
        </script>
      <?php }
    } ?>
    <!-- changement de zone -->
    <!-- activation des évènement des lieux sur la worldmap -->
    <?php if($_GET['page'] == 'lieu-0'){ ?>
      <script>
      var maxLenghText = ecrire.innerHTML.length;
      // console.log(maxLenghText);
      $( function(){
        setInterval(function(){
          // console.log($("#ecrire").html().length);
          // affichage d'image apres un certain nombre de mot
          if($("#ecrire").html().length >= 270){
            $( ".whoTalk" ).fadeIn(1000);
          }
          // affichage du bouton apres que le texte ai fini d'écrire
          if(maxLenghText < $("#ecrire").html().length){
            $("#btnNext").fadeIn(1000);
          }
        }, 300);
      })
      </script>
      <!-- effet machine à ecrire -->
      <script src="assets/js/machineEcrire.js"></script>
    <?php }
  } ?>
</body>
</html>
