<?php
  if (isset($_POST['createMonster'])) {
    $connect = con();
    foreach ($_POST as $key => $value) {
      $$key = $connect->real_escape_string($value);
    }
    $sql = "INSERT INTO Monstre
            (`Nom`)
            VALUES ('$lastname');";
    $result = $connect->query($sql);
    if ($result === false) {
      echo 'Erreur de sql: '. $connect->error;
    }
    $connect->close();
  }
?>
<!-- formulaire d'inscription -->
<form class="" action="?page=creer-monstre" method="post">
  <div>
      <label for="lastname"><strong>Nom : </strong></label></br>
      <input type="text" id="lastname" name="lastname" value="" />
  </div>
  <button class="btn btn-secondary" type="submit" name="createMonster">Créé</button>
</form>
