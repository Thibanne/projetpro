<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">GOHO?</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil</a>
      </li>
      <?php if(isConnected()){ ?>
        <li class="nav-item active">
          <a class="nav-link" href="/?page=creer-monstre">Créer monstre</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/?page=creer-stats">Créer stats</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/?page=creer-technique">Créer technique</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/?page=listetech">liste tech</a>
        </li>
          <?php require 'logout.php'; ?>
      <?php }else{ ?>
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
                      require 'inscriptionForm.php';
                      ?>
                    </div>
                    <hr>
                    <div class="col">
                      <?php
                      require 'connectionForm.php';
                      ?>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-light" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
