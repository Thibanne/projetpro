<?php
// quand le formulaire envoi ses données
if (isset($_POST['modStatsMonstre'])) {
  // connection à la base de donnée
  $connect = con();
  // pour chaque donnée envoyer par le formulaire
  foreach ($_POST as $key => $value) {
    // on les ajoute en tant que variable selon leur 'Nom'
    $$key = $connect->real_escape_string($value);
  }
  // On modifie la valeur des champs en fonction de la variable généré précédement
  $sql = "UPDATE StatsMonstre
  SET `valeur` = '$valeurStatsMonstre'
  WHERE `id` = $_GET[idRow]";
  $result = $connect->query($sql);
  // si l'envoie a raté
  if ($result === false) {
    // on affiche qu'une erreur est survenue
    echo 'Erreur de sql: '. $connect->error;
  }
  // si l'envoie a reussi on coupe la connection à la BdD
  $connect->close();
  header("Location:/?page=liste-monstreStats&id=$_GET[id]&nom=$_GET[nom]");
}
?>
<div class="offset-2 create-modForm">
  <!-- formulaire de modification -->
  <form class="" action="" method="post">
    <div>
      <label for="id"><strong><?= $_GET['stat'] ?></strong></label></br>
      <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ?>" />
    </div>
    <div>
      <label for="desc"><strong>Valeur : </strong></label></br>
      <!-- Je sécurise le champ en vérouillant la valeur maximum et minimum et en modifiant la valeur si elle dépasse -->
      <input type="text" id="desc" name="valeurStatsMonstre" maxlenghth="4" min="-9999" max="9999" onchange="(this.value<=9999 && this.value>=-9999) ? bouton.disabled=false : bouton.disabled=true;" onkeyup="if(this.value>9999){this.value=999}else if(this.value<-9999){this.value=-999}" />
    </div>
    <button class="btn btn-secondary" type="submit" name="modStatsMonstre">Modifier</button>
  </form>
  <a href="/?page=liste-monstreStats&id=<?= $_GET['id'] ?>&nom=<?= $_GET['nom'] ?>" class="btn btn-secondary">Retour</a>
</div>
