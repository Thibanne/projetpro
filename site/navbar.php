<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="/">GOHO?</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil</a>
      </li>
      <?php if(isConnected()){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Liste création
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/?page=liste-monstre">monstre</a>
          <a class="dropdown-item" href="/?page=liste-stats">stats</a>
          <a class="dropdown-item" href="/?page=liste-technique&section=1">technique</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/?page=creer-techJoueur">technique pour un joueur</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/?page=histoire">Histoire</a>
      </li>
      <?php require 'utilisateur/logout.php'; ?>
      <?php }else{ ?>
        <li class="nav-item active">
          <a class="nav-link" data-toggle="modal" data-target="#connectModal">Inscription/connection</a>        
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
