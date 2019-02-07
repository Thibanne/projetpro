<?php session_start();
require 'config.php';
require 'app/fonction.php';
$modelesFiles = autoRequireModele();
foreach ($modelesFiles as $key => $value) {
  require 'app/'.$value;
}
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
      <div id="body" class="container">
        <div class="row justify-content-between">
          <div class="offset-2">
            <?php
            if(isset($_GET['page'])
            && $_GET['page'] != 'combat'
            && $_GET['page'] != 'histoire'
            && strpos($_GET['page'],'lieu-') === false){
              require 'site/navbar.php';
            }else if(!isset($_GET['page'])){
              require 'site/navbar.php';
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
            }else if($_GET['page'] == 'histoire'){
              require urlhistoire.'couverture.php';
            }else if($_GET['page'] == 'lieu-0'){
              require urlhistoire.'lieu0.php';
            }
            // Joueur
            //urlAdminJoueur
            // Monstre
            else if($_GET['page'] == 'creer-monstre'){
              require urlAdminMonstre.'formCreateMonstre.php';
            }else if($_GET['page'] == 'modify-monstre'){
              require urlAdminMonstre.'formModMonstre.php';
            }else if($_GET['page'] == 'liste-monstre'){
              require urlAdminMonstre.'listeMonstre.php';
            }
            // Role
            //urlAdminRole
            // Stats
            else if($_GET['page'] == 'creer-stats'){
              require urlAdminStats.'formCreateStats.php';
            }else if($_GET['page'] == 'modify-stats'){
              require urlAdminStats.'formModStats.php';
            }else if($_GET['page'] == 'liste-stats'){
              require urlAdminStats.'listeStats.php';
            }
            // StatsJoueur
            else if($_GET['page'] == 'creer-statsJoueur'){
              require urlAdminStatsJoueur.'createStatsJoueur.php';
            }
            // StatsMonstre
            else if($_GET['page'] == 'creer-statsMonstre'){
              require urlAdminStatsMonstre.'createStatsMonstre.php';
            }else if($_GET['page'] == 'liste-monstreStats'){
              require urlAdminStatsMonstre.'listeMonstreStats.php';
            }else if($_GET['page'] == 'modify-statsMonstre'){
              require urlAdminStatsMonstre.'formModStatsMonstre.php';
            }
            // StatsTechnique
            else if($_GET['page'] == 'creer-statsTechnique'){
              require urlAdminStatsTech.'createStatsTech.php';
            }else if($_GET['page'] == 'modify-statsTechDegat'){
              require urlAdminStatsTech.'formModStatsTechDegat.php';
            }else if($_GET['page'] == 'modify-statsTechCout'){
              require urlAdminStatsTech.'formModStatsTechCout.php';
            }else if($_GET['page'] == 'liste-techniqueStats'){
              require urlAdminStatsTech.'listeTechniqueStats.php';
            }
            // TechniqueJoueur
            else if($_GET['page'] == 'creer-techJoueur'){
              require urlAdminTechJoueur.'createTechJoueur.php';
            }
            // TechniqueMonstre
            else if($_GET['page'] == 'creer-techMonstre'){
              require urlAdminTechMonstre.'createTechMonstre.php';
            }else if($_GET['page'] == 'liste-techMonstre'){
              require urlAdminTechMonstre.'listeTechMonstre.php';
            }
            // Technique
            else if($_GET['page'] == 'creer-technique'){
              require urlAdminTechnique.'formCreateTechnique.php';
            }else if($_GET['page'] == 'modify-technique'){
              require urlAdminTechnique.'formModTechnique.php';
            }else if($_GET['page'] == 'liste-technique'){
              require urlAdminTechnique.'listeTechnique.php';
            }
          }else{
            require 'combat/liste_monstre.php';
            resetJoueur();
          }
        }else{
          ?>
          <div class="row justify-content-center">
            <div class="col-8">
              <p> Pas connecté </p>
              <div id="ecrire">Une personne qui n’a jamais commis d’erreurs n’a jamais tenté d’innover.</div>
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
      <script>
      $.fn.machineEcrire = function(option) {

        // on prépare le plugin
        function caract (element, text, content) {

          // si le texte a une taille supp à 0, c'est qu'il reste encore des caractères
          if (text.length > 0) {

            var next = text.substr(0,1); // on récupère le caractère
            next = next.replace("\n", '<br />')

            // on enlève le caractère pour garder uniquement le reste
            text = text.substr(1);

            // on ajoute les caractères 1 par 1
            $(element).html(content+next);

            // on répète la fonction après le delai
            setTimeout(function(){
              caract(element, text, content+next);
            }, option['delai']);
          }
        }

        // on configure l'élément par défaut
        option = option || { 'delai': 50 };
        // on exécute pour la 1er fois la fonction
        caract(this, $(this).html(), '');

      }
      $(".lieu").fadeIn();
      $("#ecrire p").machineEcrire({ 'delai' : 20 });
      </script>
      <!-- modals -->
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
        <!-- barre de vie et mana + animation -->
        <script>
        <?php
        if(isset($_SESSION['battleIn'])){
          if($_SESSION['tour'] == 0){ ?>
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
          }
        } ?>
        </script>
        <!-- déplacement de carte + zoom -->
        <script>
        // info mise a jour en permance
        var mapW;
        var mapH;
        var x;
        var y;
        var w;
        var h;
        var xw;
        var yh;
        var initPosX;
        var initPosY;

        // mis a jour uniquement en mousedown pour connaitre
        // la distance entre le clic de la souris sur l'image
        // et les bord haut gauche de l'image.
        // Ceci permet de déplacer l'image et la souris
        // avec toujours la meme distance
        var currentPosX;
        var currentPosY;


        // valeur pour la molette de la souris
        var newW;
        var newH;
        var newX;
        var newY;

        function bouton(id, percentX, percentY){
          var pixelx = parseInt(((window.imgw)*percentX));
          var pixely = parseInt(((window.imgh)*percentY));
          $(id).css('margin-left', pixelx+'px')
          $(id).css('margin-top', pixely+'px')
        }

        function cssData(){
          window.mapW = parseInt($('.worldmap-container').css('width'));
          window.mapH = parseInt($('.worldmap-container').css('height'));

          window.x = parseInt($('.worldmap-container #worldmap-div').css('margin-left'));
          window.y = parseInt($('.worldmap-container #worldmap-div').css('margin-top'));
          window.w = parseInt($('.worldmap-container #worldmap-div').css('width'));
          window.h = parseInt($('.worldmap-container #worldmap-div').css('height'));
          window.xw = x + w;
          window.yh = y + h;

          window.imgx = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('margin-left'));
          window.imgy = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('margin-top'));
          window.imgw = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('width'));
          window.imgh = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('height'));
          bouton('#lieu0', 0.16, 0.48);
          bouton('#lieu1', 0.18, 0.43);
        }

        $( function() {
          // met à jour toutes les données css concernant le container et l'image
          cssData();
          var isDrag = false;
          $(".worldmap-container").on('wheel', function(event){
            if (w-10 > mapW && h-10 > mapH) {
              if(event.originalEvent.deltaY < 0){
                newW = w + 10;
                newH = h + 10;
                newX = x - 5;
                newY = y - 5;
              }else {
                if( x > (mapW-w)){
                  newW = w - 10 ;
                }
                if( y > (mapH-h)){
                  newH = h - 10;
                }
                if(x > 0){
                  newX = 0;
                }else{
                  newX = x + 5;
                }
                if(y > 0){
                  newY = 0;
                }else{
                  newY = y + 5;
                }
              }
              parseInt($('.worldmap-container #worldmap-div').css('margin-left', newX+'px'));
              parseInt($('.worldmap-container #worldmap-div').css('margin-top', newY+'px'));
              parseInt($('.worldmap-container #worldmap-div').css('width', newW+'px'));
              parseInt($('.worldmap-container #worldmap-div').css('height', newH+'px'));

              // met à jour toutes les données css concernant le container et l'image
              cssData();

              if( x < (mapW-w)){
                $('.worldmap-container #worldmap-div').css( 'margin-left', ((mapW-w))+'px' ) ;
                isDrag = false;
              }

            }else{
              parseInt($('.worldmap-container #worldmap-div').css('margin-left', '-11px'));
              parseInt($('.worldmap-container #worldmap-div').css('margin-top', '-11px'));
              parseInt($('.worldmap-container #worldmap-div').css('width', (mapW+11)+'px'));
              parseInt($('.worldmap-container #worldmap-div').css('height', (mapH+11)+'px'));

              // met à jour toutes les données css concernant le container et l'image
              cssData();
            }
          });

          $( ".worldmap-container #worldmap-div" ).mousedown(function(event){
            var decalx = parseInt($('.worldmap-container #worldmap-div').css('margin-left'));
            var decaly = parseInt($('.worldmap-container #worldmap-div').css('margin-top'));
            isDrag = true;
            // calcule la distance entre la position du curseur et l'image
            initPosX = (event.pageX-decalx);
            initPosY = (event.pageY-decaly);

            return false;
          });
          $('.worldmap-container').on('mouseup mouseleave', function() {
            isDrag = false;
          });
          $('.worldmap-container').mousemove(function(event){
            // met à jour toutes les données css concernant le container et l'image
            cssData();

            if(isDrag){
              // la distance est deja calculé pour comprendre que la souris reste a la bonne
              // distance du bord haut gauche de l'image ce qui correspond a initPosX.
              // Maintenant grace au deplacment de la souris l'image aussi
              // ce déplace avec toujours la meme distance entre les bord haut gauche et le curseur de la souris
              currentPosX = -(initPosX - event.pageX);
              $('.worldmap-container #worldmap-div').css( 'margin-left', currentPosX+'px' )

              if(x > 0){
                $('.worldmap-container #worldmap-div').css( 'margin-left', '0px' )
                isDrag = false;
              }
              // taille du container plus petite que limage.
              // ce qui fait une valeur négatif.
              // si x recule de trop en dessous de cette limite alors c'est
              // que le bord right de limage devient inferieur au bord right du container
              if( x < (mapW-w)){
                $('.worldmap-container #worldmap-div').css( 'margin-left', ((mapW-w))+'px' ) ;
                isDrag = false;
              }

              // fait l'action du drag.
              // l'action prend en compte la derniere position de l'image grace a initposy
              // qui corespond a la position de l'image lorsque le drag est fini
              currentPosY = -(initPosY - event.pageY);
              $('.worldmap-container #worldmap-div').css( 'margin-top', currentPosY+'px' ) ;

              if(y > 0){
                $('.worldmap-container #worldmap-div').css( 'margin-top', '0px' )
                isDrag = false;
              }

              // meme chose que plus haut pour if( x < (mapW-w)){
              if( y < (mapH-h)){
                $('.worldmap-container #worldmap-div').css( 'margin-top', -(h-mapH)+'px' ) ;
                isDrag = false;
              }


            }
          })
        } );
        </script>
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
        <!-- combat: Si assomé -->
        <script>
          lieu0.onclick = function(){ window.location = '/?page=lieu-0'}
        </script>

      </body>
      </html>
