<?php
  $lieu0 = file_get_contents('histoire/texte/lieu-0.php');
  $lieu0 = trim($lieu0);
  $lieu0 = str_replace('<nomdujoueur>', $_SESSION['pseudo'], $lieu0);
?>
<div class="row align-items-center justify-content-center rowStory">
  <div class="">
    <img class="whoTalk" src="../assets/img/Lynel.png" alt="Lynel">
  </div>
  <div class="col-8">
    <div id="ecrire" class="lieu">
      <p><?= $lieu0 ?></p>
    </div>
    <div class="offset-5">
      <a id="btnStory" class="btn btnStory" href="/?page=couverture">Suite</a>
    </div>
    <script>
    var maxLenghText = ecrire.innerHTML.length;
    window.onload = function (){
        setInterval(function(){
          if(maxLenghText-4<ecrire.innerHTML.length){
            btnStory.style.display='inline';
          }
        }, 300);
    }
    </script>
  </div>
</div>
