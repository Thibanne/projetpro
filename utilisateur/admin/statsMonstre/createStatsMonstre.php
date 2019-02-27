<?php
// connection à la base de donnée
$connect = con();
// selection de toutes les stats dans la BdD
$sql = "SELECT * FROM `Stats`";
$result = $connect->query($sql);
// selection de toute les lignes reçu de la BdD
$tableStats = $result->fetch_all(MYSQLI_ASSOC);
// quand le formulaire envoi ses données
if (isset($_POST['createStatsMonstre'])) {
  $connect = con();
  // pour chaque donnée envoyer par le formulaire
  foreach ($_POST as $key => $value) {
    // on les ajoute en tant que variable selon leur 'Nom'
    $$key = $connect->real_escape_string($value);
  }
  // on ajoute dans la BdD la valeur correspondant a sa variable
  $sql = "INSERT INTO StatsMonstre
  (`id_monstre`, `id_stats`, `Valeur`)
  VALUES ('$_GET[id]', '$stats', '$valeur');";
  $result = $connect->query($sql);
  // si l'envoie a raté
  if ($result === false) {
    // on affiche qu'une erreur est survenue
    echo 'Erreur de sql: '. $connect->error;
  }
  // si l'envoie a reussi on coupe la connection à la BdD
  $connect->close();
}
?>
<div class="offset-2 create-modForm">
  <form class="" action="" method="post">
    <div class="">
      <label for="">Stats</label>
      <select class="btn btn-secondary" class="" name="stats">
        <?php foreach ($tableStats as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Nom']) ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="">
      <label for="">Valeur</label>
      <!-- Je sécurise le champ en vérouillant la valeur maximum et minimum et en modifiant la valeur si elle dépasse -->
      <input type="number" id="valeur" name="valeur" maxlenghth="4" min="-9999" max="9999" onchange="(this.value<=9999 && this.value>=-9999) ? bouton.disabled=false : bouton.disabled=true;" onkeyup="if(this.value>9999){this.value=999}else if(this.value<-9999){this.value=-999}" required />
    </div>
    <input class="btn btn-secondary" type="submit" id="bouton" name="createStatsMonstre" value="Créé" disabled />
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
