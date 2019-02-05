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
        if(isset($_GET['page']) && $_GET['page'] != 'combat' && $_GET['page'] != 'histoire'){
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
        }else if($_GET['page'] == 'histoire'){
          require urlhistoire.'couverture.php';
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
    <script>
    window.scale = 1.0;
    $(".worldmap-image").on('wheel', function(event){
    	if(event.originalEvent.deltaY < 0){
    		window.scale += 0.1;
    	}else {
    			window.scale -= 0.1;
    	}
    	if(window.scale < 1.0){
    		window.scale = 1.0;
    	}
    	$(".worldmap-image #worldmap").css('transform', 'scale('+window.scale+')')
    	console.log(window.scale)
    });

    $( function() {
    	var mouseX;
    	var mouseY;
    	var isDrag = false;

    	var initPosX;
    	var initPosY;

    	var currentPosX;
    	var currentPosY;
    	$( ".worldmap-image #worldmap" ).mousedown(function(event){
    		var decalx = parseInt($('.worldmap-image #worldmap').css('margin-left'));
    		var decaly = parseInt($('.worldmap-image #worldmap').css('margin-top'));
    		isDrag = true;
    		initPosX = (event.pageX-decalx);
    		initPosY = (event.pageY-decaly);

    		return false;
    	});
    	$('.worldmap-image').on('mouseup mouseleave', function() {
    	    isDrag = false;
    	});
    	$('.worldmap-image').mousemove(function(event){

    		var mapW = parseInt($('.worldmap-image').css('width'));
    		var mapH = parseInt($('.worldmap-image').css('height'));

    		var x = parseInt($('.worldmap-image #worldmap').css('margin-left'));
    		var y = parseInt($('.worldmap-image #worldmap').css('margin-top'));
    		var w = parseInt($('.worldmap-image #worldmap').css('width'));
    		var h = parseInt($('.worldmap-image #worldmap').css('height'));
    		var xw = x + w;
    		var yh = y + h;

    		var stopX = (x < 1) && (x > (mapW-w))
    		var stopY = (y < 1) && (y > -(mapH-1))

    		if(isDrag ){
    			if(stopX){
    				// initPosX: prend en compte le decalage de l'image
    				// event.pageX: deplace l'image par rapport au dernier decalage enregistré
    				// puisqu'il y a la valeur initPosX
    				currentPosX = -(initPosX - event.pageX);
    				$('.worldmap-image #worldmap').css( 'margin-left', currentPosX+'px' ) ;
    			}else{
    				// permet de savoir si on est a plus de la moitier de l'image lors de la colision
    				if((x > ((mapW-w)/2))){
    					$('.worldmap-image #worldmap').css( 'margin-left', '-1px' ) ;
    				}else{
    					// limite de deplacement droit de la carte c'est: le bord droit de l'image
    					// qui ne se positionne pas avant le bord du cadre.
    					// Le +1 permet de deplacer pour ne plus rester dans la condition qui
    					// empeche le deplacement à la souris
    					$('.worldmap-image #worldmap').css( 'margin-left', ((mapW-w)+1)+'px' ) ;
    				}
    				isDrag = false;
    				// initPosX = event.pageX-x;
    				// initPosY = (event.pageY-y);
    			}
    			if(stopY){
    				currentPosY = -(initPosY - event.pageY);
    				$('.worldmap-image #worldmap').css( 'margin-top', currentPosY+'px' ) ;
    			}else{
    				if(y > -(mapH/2)){
    					$('.worldmap-image #worldmap').css( 'margin-top', '-1px' ) ;
    				}else{
    					$('.worldmap-image #worldmap').css( 'margin-top', ((-mapW)+2)+'px' ) ;
    				}
    				isDrag = false;
    			}

    		}
    	})
    } );
    </script>
    <script>
      $( function(){
        mapHighres.onload = function(){
          // mapHighres.style.display = 'inline';
          // mapLowres.style.display = 'none';
          alert('marche ?');
        };
      });
    </script>

  </body>
  </html>
