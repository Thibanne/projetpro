<script>
// Del
  <?php if (isset($_POST['del'])) {?>
      $.notify("Suppréssion bien effectué", "success");
  <?php }
// Monstre
  if (isset($_POST['createMonster'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. Monstre non créé", "info");
  <?php }else{ ?>
      $.notify("Le monstre <?= '\"'.$monsterName.'\" à bien été créé' ?>", "success");
  <?php }
  }
  if (isset($_POST['modMonstre'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. Monstre non modifié", "info");
  <?php }else{ ?>
      $.notify("Le monstre <?= '\"'.$monsterName.'\" à bien été modifier'?>", "success");
  <?php }
  }
// Stats
  if (isset($_POST['createStats'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. statistique non créé", "info");
  <?php }else{ ?>
      $.notify("La statistique <?= '\"'.$Nom.'\" à bien été créé' ?>", "success");
  <?php }
  }
  if (isset($_POST['modStats'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. statistique non modifié", "info");
  <?php }else{ ?>
      $.notify("La statistique <?= '\"'.$statsName.'\" à bien été modifier'?>", "success");
  <?php }
  }
// StatsMonstre
  if (isset($_POST['createStatsMonstre'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. stats du Monstre non créé", "info");
  <?php }else{ ?>
      $.notify("La statistique <?= '\"'.$tableStats[$stats-1]['Nom'].'\" à bien \n été assigner a \"'.$_GET['nom'].'\" \n à la valeur de \"'.$valeur.'\"' ?>", "success");
  <?php }
  }
  if (isset($_POST['modStatsMonstre'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. stats du Monstre non modifié", "info");
  <?php }
  }
// StatsTech
  if (isset($_POST['createStatsTech'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. statistique non asignée", "info");
  <?php }else{ ?>
      $.notify("La statistique <?= '\"'.$tableStats[$stats-1]['Nom'].'\" à bien été asignée' ?>", "success");
  <?php }
  }
  if (isset($_POST['modStatsTechCout'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. statistique non modifié", "info");
  <?php }else{ ?>
      $.notify("La valeur de  <?= '\"'.$statNom.'\" à bien été modifier'?>", "success");
  <?php }
  }
  if (isset($_POST['modStatsTechDegat'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. statistique non modifié", "info");
  <?php }else{ ?>
      $.notify("La statistique <?= '\"'.$statNom.'\" à bien été modifier'?>", "success");
  <?php }
  }
// TechMonstre
  if (isset($_POST['createTechMonstre'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. technique non asignée", "info");
  <?php }else{ ?>
      $.notify("La technique <?= '\"'.$tableTechnique[$technique-1]['Nom'].'\" à bien été asignée' ?>", "success");
  <?php }
  }
// Technique
  if (isset($_POST['createTechnique'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. technique non créé", "info");
  <?php }else{ ?>
      $.notify("La technique <?= '\"'.$techName.'\" à bien été créé' ?>", "success");
  <?php }
  }
  if (isset($_POST['modTechnique'])) {
    if ($result === false) { ?>
      $.notify("Erreur de sql. technique non modifié", "info");
  <?php }else{ ?>
      $.notify("La technique <?= '\"'.$techName.'\" à bien été modifier'?>", "success");
  <?php }
  } ?>
</script>
