<?php session_start();
require 'techniques.php';
require 'fonction.php';
// je verifie si un choix de combat a été fait
if(isset($_POST['combat'])){
  $_SESSION['tour']=0;
  $_SESSION['journaldecombat']=[];
  // je verifie en fonction de la valeur du combat selectionné
  if( $_POST['combat']=='Gobelin'){
    // Je mémorise le fait d'être en combat
    $_SESSION['battleIn']=true;
    // je mémorise en fonction du nom du monstre avec qui je suis en combat
    $_SESSION['avec']=$_POST['combat'];
    // je mémorise les statistiques du monstre en question
    $_SESSION['monstre'] = [
      'PV' => 50,
      'mana' => 0,
      'attaque' => -5,
      'isRandom' => false
    ];
  }else if($_POST['combat']=='Orc'){
    $_SESSION['battleIn']=true;
    $_SESSION['avec']=$_POST['combat'];
    $_SESSION['monstre'] = [
      'PV' => 75,
      'mana' => 20,
      'attaque' => -10,
      'isRandom' => true
    ];
  }
}

// Si je suis en combat, j'affiche avec qui
if(isset($_SESSION['battleIn'])){
  // quand je declare une attaque
  if(isset($_POST['skill'])){
    // j'incremente 1 au nombre de tour de combat
    $_SESSION['tour']=$_SESSION['tour']+1;
    $_SESSION['journaldecombat'][$_SESSION['tour']-1][]='Tour '.$_SESSION['tour'];
    // Je verifie le type d'attaque
    if($_POST['skill']=='Attaque'){
      // je fais le calcul des dommages fait au monstre
      subit_Attaque('monstre', 'PV', 'joueur', 'attaque');
      // affichage des actions effectuer durant le tour du joueur
    }else if($_POST['skill']=='Soin'){
      $donneSoin = $technique['attaquant'][$_POST['skill']]['PV'];
      // la fonction fait que les PV du monstre sont ajouter a la valeur de la variable
      subit_soin('joueur','PV',$donneSoin);
    }else{
      $donneDegat = $technique['defenseur'][$_POST['skill']]['PV'];
      // la fonction fait que les PV du joueur sont retiré de la valeur de la $technique aléatoire
      subit_attaqueRandom('monstre', 'PV', $donneDegat, $_POST['skill']);
    }
    // je fais le calcul des dommages que fait le monstre
    // si le monstre peut faire une attaque aléatoire
    if($_SESSION['monstre']['isRandom']){
      $skill[0] = randAttaque();
      // je lui dit d'agir
      // selon son attaque je prepare des exeptions
      // S'il attaque normalement
      if($skill[0]=='Attaque'){
        // la fonction fait que les PV du joueur sont retiré de l'attaque du monstre
        subit_Attaque('joueur', 'PV', 'monstre', 'attaque');
      // s'il fait un soin
      }else if($skill[0]=='Soin'){
        // J'affecte à la variable la valeur de la $technique soin
        $donneSoin = $technique['attaquant'][$skill[0]]['PV'];
        // la fonction fait que les PV du monstre sont ajouter a la valeur de la variable
        subit_soin('monstre','PV',$donneSoin);
      // Si ce n'est ni une attaque normale ni un soin
      }else{
        // J'affecte à la variable la valeur de la $technique aléatoire
        $donneDegat = $technique['defenseur'][$skill[0]]['PV'];
        // la fonction fait que les PV du joueur sont retiré de la valeur de la $technique aléatoire
        subit_attaqueRandom('joueur', 'PV', $donneDegat, $skill[0]);
      }
    } else {
      // s'il nest pas aléatoire
      $_SESSION['joueur']['PV']=$_SESSION['joueur']['PV']+$_SESSION['monstre']['attaque'];
      // affichage des actions effectuer durant le tour du monstre
      jdc($_SESSION['avec'].' vous a attaqué et vous avez subit '.abs($_SESSION['monstre']['attaque']).' dégats');
    }

  }
  // Affichage des statistiques joueur et monstres
  echo 'Vous avez '.$_SESSION['joueur']['PV'].' PV et '.$_SESSION['joueur']['mana'].' mana<br />';
  echo 'Vous combattez '.$_SESSION['avec']. ' qui a '.  $_SESSION['monstre']['PV'].' PV<br />';
  require('combat_tech_utilisable.php');
  // Inversement du sens d'ecriture de la boucle
  krsort($_SESSION['journaldecombat']);
  // Journal enregistré sous forme de "tour"
  foreach ($_SESSION['journaldecombat'] as $key1 => $value1) {
    // Actions effectuer durant le tour précédent
    foreach ($value1 as $key => $value) {
      echo $value.'<br />';
    }
  }
  // sinon je renvoi sur la page de selection
} else {
  header('Location:http://projetpro/') ;
}
?>
