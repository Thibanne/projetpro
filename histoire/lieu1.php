<?php
  $lieu1 = file_get_contents('histoire/texte/lieu-1.php');
  $lieu1 = trim($lieu1);
  $lieu1 = str_replace('<nomdumonstre>', 'Nonoseau',$lieu1);
?>
<div class="row align-items-center justify-content-center rowStory">
  <div class="col-8">
    <div id="ecrire" class="lieu">
      <p><?= $lieu1 ?></p>
    </div>
  </div>
</div>
