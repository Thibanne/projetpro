<?php
  if (isset($_POST['createTechnique'])) {
    $connect = con();
    foreach ($_POST as $key => $value) {
      $$key = $connect->real_escape_string($value);
    }
    $sql = "INSERT INTO Technique
            (`Nom`, `Description`)
            VALUES ('$techName', '$descTech');";
    $result = $connect->query($sql);
    if ($result === false) {
      echo 'Erreur de sql: '. $connect->error;
    }
    $connect->close();
  }
?>
<!-- formulaire d'inscription -->
<form class="" action="?page=creer-technique" method="post">
  <div>
      <label for="name"><strong>Nom : </strong></label></br>
      <input type="text" id="name" name="techName" value="" />
  </div>
  <div>
    <label for="desc"><strong>Description : </strong></label></br>
    <input type="text" id="desc" name="descTech" value="" />
  </div>
  <button class="btn btn-secondary" type="submit" name="createTechnique">Créé</button>
</form>
