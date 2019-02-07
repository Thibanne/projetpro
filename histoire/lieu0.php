<?php
  $lieu0 = file_get_contents('histoire/texte/lieu-0.php');
  $lieu0 = trim($lieu0);
  $lieu0 = str_replace('<nomdujoueur>', $_SESSION['pseudo'],$lieu0);
?>
<div class="row align-items-center justify-content-center rowStory">
  <div class="col-8">
    <div id="ecrire" class="lieu">
      <p><?= $lieu0 ?></p>
    </div>
  </div>
</div>
