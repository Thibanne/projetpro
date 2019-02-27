<?php
// connection à la base de donnée
$connect = con();
// selection de tout les monstre dans la BdD
$sql = "SELECT * FROM `Monstre`";
$result = $connect->query($sql);
// selection de toute les lignes reçu de la BdD
$tableMonstre = $result->fetch_all(MYSQLI_ASSOC);
// un fois que l'on créé un monstre
if (isset($_POST['createMonster'])) {
  $connect = con();
  // pour chaque donnée envoyer par le formulaire
  foreach ($_POST as $key => $value) {
    // on les ajoute en tant que variable selon leur 'Nom'
    $$key = $connect->real_escape_string($value);
  }
  // on ajoute dans la BdD la valeur correspondant a sa variable
  $sql = "INSERT INTO Monstre
  (`Nom`, `Description`)
  VALUES ('$monsterName', '$descMonster');";
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
<!-- formulaire de création de monstre -->
<div class="offset-2 create-modForm">
  <form class="form-group" action="" method="post">
    <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="monsterName" value="" />
    </div>
    <div>
      <label for="desc"><strong>Description : </strong></label></br>
      <input type="text" id="desc" name="descMonster" value="" />
    </div>
    <button class="btn btn-secondary" type="submit" name="createMonster">Créé</button>
  </form>
  <a href="/?page=liste-monstre" class="btn btn-secondary">Retour liste</a>
</div>
