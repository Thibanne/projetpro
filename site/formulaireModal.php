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
          <div class="col modalConnect">
          <?php
            if(!isset($_POST['newOne']) || isset($_POST['oldOne'])){
              require 'utilisateur/connectionForm.php';
            }else if(isset($_POST['newOne'])){
              require 'utilisateur/inscriptionForm.php';
            }
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
