<?php

// Journal de combat
function jdc($journaldecombat){
  // enregistre toute les phrases sur 1 tour
  $_SESSION['journaldecombat'][$_SESSION['tour']-1][] = $journaldecombat;
}
// modal victoire/defaite
function victoryModal($titre, $result){ ?>
<!-- création du modal -->
<div id="victoryModal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="victoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- changement du titre selon la victoire/defaite -->
        <h5 class="modal-title"><?= $titre ?></h5>
      </div>
      <div class="modal-body">
        <!-- changement du resultat en fonction de la victoire/defaite -->
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

// fonction pour la connection à la base de Données
function con(){
  // je me connecte grâce aux informations envoyer via une requete 'mysqli_connect'
  $con = mysqli_connect("localhost","Thane","T&vl1Sic*rrqT!)MC^","jeuxnon");
  // si une erreur apparait lors de la connection ...
  if (mysqli_connect_errno()){
    // ... j'affiche l'erreur ...
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   // ... et je coupe le script
   exit;
  }
  // J'associe à la connection la visibilité des accents
  $con->set_charset("utf8");
  return $con;
}

// reinitialisation des statistiques du joueur s'il n'est plus en combat
function resetJoueur(){
  unset($_SESSION['battleIn']);
  $_SESSION['joueur'] = [
    'PV' => 100,
    'mana' => 100,
    'stun' => 0
  ];
}

// // Debut des Regex //
/*
   ___                  
  / _ \___ ___ ______ __
 / , _/ -_) _ `/ -_) \ /
/_/|_|\__/\_, /\__/_\_\ 
         /___/
*/
// Verifie si le nom/prénom ne possede pas de caratère conforme
function isNameValid($var) {
  return preg_match('/^[a-zA-ZÂ-ÿ -]+$/i', $var);
}
// de même pour les pseudos
function isLoginValid($var) {
  return preg_match('/^([a-zA-Z](?:(?:(?:\w[\.\_]?)*)\w)+)([a-zA-Z0-9])$/i', $var);
}
// vérification s'il le pseudo n'est pas déja utilisé
function isLoginTaken() {
  global $login;
  $connect = con();
  $sql = "SELECT `Pseudo` FROM `Utilisateur` WHERE `Pseudo` = '$login'";
  $result = $connect->query($sql);
  if ($result->num_rows){
    return true;
  }
  return false;
}
// // Fin des Regex //

// vérifie si un utilisateur est bien connecté
function isConnected(){
  return !empty($_SESSION['pseudo']);
}
// vérifié si l'utilisateur est un admin
function isAdmin(){
  return ($_SESSION['pseudo'] == 'sadmin');
}

// // Bar de stat combat //
/*
 _______  _______  _______  ______   _______ _________
(  ____ \(  ___  )(       )(  ___ \ (  ___  )\__   __/
| (    \/| (   ) || () () || (   ) )| (   ) |   ) (   
| |      | |   | || || || || (__/ / | (___) |   | |   
| |      | |   | || |(_)| ||  __ (  |  ___  |   | |   
| |      | |   | || |   | || (  \ \ | (   ) |   | |   
| (____/\| (___) || )   ( || )___) )| )   ( |   | |   
(_______/(_______)|/     \||/ \___/ |/     \|   )_(   
                                                      
*/
// calcule les PV actuel du joueur en pourcentage
function playerPVPercent(){
  return (($_SESSION['joueur']['PV']/$_SESSION['basePVjoueur'])*100);
}
// calcule la mana actuel du joueur en pourcentage
function playerManaPercent(){
  return (($_SESSION['joueur']['mana']/$_SESSION['baseManajoueur'])*100);
}
// calcule les PV actuel du monstre en pourcentage
function monsterPVPercent(){
  return (($_SESSION['monstre']['PV']/$_SESSION['basePVmonstre'])*100);
}
// // fin Bar de stat combat //

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

// cherche un mot dans l'url
function findGetPage($tableStrPage){
  // pour chaque mot recherché
  foreach ($tableStrPage as $key => $value) {
    // s'il existe dans l'url
    if(strpos($_GET['page'], $value) !== false){
      // on retourne vrai
      return true;
    }
  }
  // si aucun mot n'a été trouvé retourne faux
  return false;
}
/*
function mp3($id, $music){
  ?>
    <audio autoplay loop>
      <source id="<?= $id ?>" src="assets/musique/<?= $music ?>" type="audio/mpeg">
    </audio>
  <?php
}
*/
?>
