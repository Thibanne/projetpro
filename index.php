<?php session_start();
// Avec session_start() je récupère les données enregistré dans une valeur ID unique, ou j'en génère une vide
require 'config.php';
require 'app/fonction.php';
$modelesFiles = autoRequireModele();
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
  <link rel="stylesheet" href="assets/css/jquery-ui" />
  <link rel="stylesheet" href="assets/css/jquery-ui-structure" />
  <link rel="stylesheet" href="assets/css/jquery-ui-theme" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <?php
  if(isset($_GET['page'])){
    $tableStrPage = ['creer', 'liste', 'modify', 'profil'];
    if(findGetPage($tableStrPage)){
      ?><link rel="stylesheet" href="assets/css/BDD.css" /><?php }
      if($_GET['page'] == 'histoire'){
        ?><link rel="stylesheet" href="assets/css/histoire.css" /><?php }
      if($_GET['page'] == 'lieu-0'){
        ?><link rel="stylesheet" href="assets/css/lieu0.css" /><?php }
      if($_GET['page'] == 'lieu-1'){
        ?><link rel="stylesheet" href="assets/css/lieu1.css" /><?php }
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
                <p> Pas connecté </p>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="assets/js/fonction.js"></script>
        <!-- musique -->
        <script>
        // if(isConnected()){
        //   musicAccueil.currentTime="12"
        // }
        </script>
        <!-- effet machine à ecrire -->
        <?php require 'assets/js/machineEcrire.js'; ?>
        <!-- modals -->
        <?php require 'assets/js/victoryModal.js'; ?>
        <?php require 'assets/js/connectModal.js'; ?>
        <!-- barre de vie et mana + animation -->
        <?php require 'assets/js/health-manaBar.js'; ?>
        <!-- déplacement de carte + zoom -->
        <?php require 'assets/js/worldmap.js'; ?>
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
        <!-- activation des évènement des lieux sur la worldmap -->
        <script>
          lieu0.onclick = function(){ window.location = '/?page=lieu-0'}
        </script>
        <!-- affichage d'image apres un moment -->
        <script>
          $( function(){
            $( ".whoTalk" ).delay(5000).fadeIn( 1000 );
          });
        </script>
      </body>
      </html>
