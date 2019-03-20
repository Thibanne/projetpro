<script>
// Variable de la marge droite(mr) de la barre
var mr = 47;
<?php
if(isset($_SESSION['battleIn'])){
  if($_SESSION['tour'] == 0){ ?>
    $('.skillbar').each(function(){
      var result = reducteurPX(this, mr, $(this).attr('data-percent'));

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
      var ancienPVJoueur = reducteurPX(this, mr, "<?= $_SESSION['tempPVJoueur'] ?>%");
      var ancienManaJoueur = reducteurPX(this, mr, "<?= $_SESSION['tempMana'] ?>%");
      var ancienPVMonstre = reducteurPX(this, mr, "<?= $_SESSION['tempPVMonstre'] ?>%");
      var resultActuel = reducteurPX(this, mr, $(this).attr('data-percent'));
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
