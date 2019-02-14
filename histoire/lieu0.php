<?php
  $lieu0 = file_get_contents('histoire/texte/lieu-0.php');
  $lieu0 = trim($lieu0);
  $lieu0 = str_replace('<nomdujoueur>', $_SESSION['pseudo'], $lieu0);
?>
<div class="row align-items-center justify-content-center rowStory">
  <div class="">
    <img class="whoTalk" src="../assets/img/Lynel.png" alt="Lynel">
  </div>
  <div class="col-lg-8 col-md-8 col-sm-10 col-xl-10">
    <div id="ecrire" class="lieu">
      <p><?= $lieu0 ?></p>
    </div>
    <div class="offset-5">
      <a id="btnNext" class="btn btnStory" href="/?page=histoire&l1">Suite</a>
    </div>
  </div>
</div>
