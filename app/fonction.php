<?php

function jdc($journaldecombat){
  $_SESSION['journaldecombat'][$_SESSION['tour']-1][] = $journaldecombat;
}

function victoryModal($titre, $result){
?>
<div id="victoryModal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="victoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= $titre ?></h5>
      </div>
      <div class="modal-body">
        <p> <?= $_SESSION['avec'].' '.$result ?></p>
      </div>
      <div class="modal-footer">
        <a href="/" class="btn btn-secondary">Okay</a>
      </div>
    </div>
  </div>
</div>
<?php
}

function con(){
  $con = mysqli_connect("localhost","Thane","T&vl1Sic*rrqT!)MC^","jeuxnon");
  if (mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;
  }
  $con->set_charset("utf8");
  return $con;
}

function resetJoueur(){
  unset($_SESSION['battleIn']);
  $_SESSION['joueur'] = [
    'PV' => 100,
    'mana' => 100,
    'stun' => 0
  ];
}

function isNameValid($var) {
    return preg_match('/^[a-zA-ZÂ-ÿ -]+$/i', $var);
}

function isLoginValid($var) {
    return preg_match('/^([a-zA-Z](?:(?:(?:\w[\.\_]?)*)\w)+)([a-zA-Z0-9])$/i', $var);
}

function isConnected(){
  return !empty($_SESSION['pseudo']);
}

function playerPVPercent(){
  return (($_SESSION['joueur']['PV']/$_SESSION['basePVjoueur'])*100);
}

function playerManaPercent(){
  return (($_SESSION['joueur']['mana']/$_SESSION['baseManajoueur'])*100);
}

function monsterPVPercent(){
  return (($_SESSION['monstre']['PV']/$_SESSION['basePVmonstre'])*100);
}

// Class pour selectioné des fichiers selon la recherche
class AutoSearchFile {
  // je vérouille des variables
  private $strSearch;
  private $directory;

  // je parametre les arguments d'objet
  function __construct($directory, $strSearch) {
    $this->directory = $directory;
    $this->strSearch = $strSearch;
  }
  //
  public function searchDirFiles(){
    // liste les élément présent dans le dossier en excluant les 2 premiers éléments (. et ..)
    $dirContent = array_slice(scandir($this->directory), 2);
    // copie le tableau avec uniquement les valeurs désiré
    $dirFiles = array_filter($dirContent,  function($v) {
                  // on filtre les valeurs du tableau,
                  return ((strpos($v, $this->strSearch) !== false));
                  // fait passer la valeur comme argument
                }, ARRAY_FILTER_USE_BOTH);
    return $dirFiles;
  }
}

function findGetPage($tableStrPage){
  foreach ($tableStrPage as $key => $value) {
    if(strpos($_GET['page'], $value) !== false){
      return true;
    }
  }
  return false;
}

function mp3($id, $music){
  ?>
    <audio autoplay loop>
      <source id="<?= $id ?>" src="assets/musique/<?= $music ?>" type="audio/mpeg">
    </audio>
  <?php
}
?>
