<?php
// quand le formulaire envoi ses données
if (isset($_POST['modMonstre'])) {
  // connection à la base de donnée
  $connect = con();
  // pour chaque donnée envoyer par le formulaire
  foreach ($_POST as $key => $value) {
    // on les ajoute en tant que variable selon leur 'Nom'
    $$key = $connect->real_escape_string($value);
  }
  // On modifie la valeur des champs en fonction de la variable généré précédement
  $sql = "UPDATE Monstre
  SET `Nom` = '$monsterName', `Description` = '$descMonster'
  WHERE `id` = $_GET[id]";
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
  <!-- formulaire de modification -->
  <form class="" action="" method="post">
    <div>
      <label for="id"><strong></strong></label><br />
      <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ?>" />
    </div>
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="monsterName" value="" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descMonster" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="modMonstre">Modifier</button>
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
