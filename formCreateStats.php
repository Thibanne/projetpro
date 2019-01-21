<?php
  if (isset($_POST['createStats'])) {
    $connect = con();
    foreach ($_POST as $key => $value) {
      $$key = $connect->real_escape_string($value);
    }
    $sql = "INSERT INTO Stats
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
<form class="" action="?page=creer-stats" method="post">
  <div>
      <label for="lastname"><strong>Nom : </strong></label></br>
      <input type="text" id="lastname" name="lastname" value="" />
  </div>
  <button type="submit" name="createStats">Créé</button>
</form>
