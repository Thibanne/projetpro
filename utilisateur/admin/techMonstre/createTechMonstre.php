<?php
// connection à la base de donnée
$connect = con();
// selection de toutes les techniques dans la BdD
$sql = "SELECT * FROM `Technique`";
$result = $connect->query($sql);
// selection de toute les lignes reçu de la BdD
$tableTechnique = $result->fetch_all(MYSQLI_ASSOC);
// quand le formulaire envoi ses données
if (isset($_POST['createTechMonstre'])) {
  $connect = con();
  // pour chaque donnée envoyer par le formulaire
  foreach ($_POST as $key => $value) {
    // on les ajoute en tant que variable selon leur 'Nom'
    $$key = $connect->real_escape_string($value);
  }
  // on ajoute dans la BdD la valeur correspondant a sa variable
  $sql = "INSERT INTO TechniqueMonstre
  (`id_monstre`, `id_technique`)
  VALUES ($_GET[id], '$technique');";
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
    <input type="hidden" name="id_techMonstre" value="<?= $_GET['id'] ?>">
    <div class="">
      <label for="">Technique</label>
      <select class="btn btn-secondary" class="" name="technique">
        <?php foreach ($tableTechnique as $key => $value){ ?>
          <option value="<?= $value['id'] ?>"><?= ucfirst($value['Nom']) ?></option>
        <?php } ?>
      </select>
    </div>
    <input class="btn btn-secondary" type="submit" id="bouton" name="createTechMonstre" value="Assigner" />
  </form>
  <a href="/?page=liste-technique&section=1" class="btn btn-secondary">Retour liste</a>
</div>
