<?php session_start();
require 'fonction.php';
// Avec session_start() je récupère les données enregistré dans une valeur ID unique, ou j'en génère une vide
// je vérifie et je valide le formulaire de connection
// S'il se deconnecte je vide la session
if(isset($_POST['logout'])){
  $_SESSION = [];
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
  <title>pasdenom</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-between">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">napasdenom</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Acceuil</a>
            </li>
            <?php if (condition){ ?>

            <li class="nav-item active">
              <a class="nav-link" href="?page=combat">combat</a>
            </li>
          <?php } ?>

            <li class="nav-item active">
              <a class="nav-link" href="?page=2">page 2</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="?page=logout">Logout</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" data-toggle="modal" data-target="#connectModal">Inscription/connection</a>
              <div id="connectModal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="connectModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Inscription/connection</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col">
                          <?php
                          require 'form.php';
                          ?>
                        </div>
                        <hr>
                        <div class="col">
                          <?php
                          require 'connection.php';
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <?php
    // j'affiche la page de session si connecté
    if ($_GET['page'] == 'logout') {
        $_SESSION = [];
    }
    if(isConnected()){
      // si il y a un choix de page on affiche une partie du site (si on est deja conecter)
      if(isset($_GET['page'])){
        if ($_GET['page'] == 'combat') {
          require 'liste_monstre.php';
        }else if ($_GET['page'] == '1') {
          echo 'page '.$_GET['page'];
        }else if ($_GET['page'] == '2') {
          echo 'page '.$_GET['page'];
        }else if ($_GET['page'] == '3') {
          echo 'page '.$_GET['page'];
        }
      }else{ // sinon il y a pas de page defini alors on affiche ça dans tout les cas
        echo 'Vous êtes connecté';
        require 'logout.php';
        resetJoueur();
      }
      // sinon j'affiche  un formulaire de connection
    } else {

    }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
  $('#victoryModal').modal({
    show : true,
    keyboard : false,
    backdrop : 'static'
  });
  </script>

</body>
</html>
