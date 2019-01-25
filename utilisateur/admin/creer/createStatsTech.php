<?php
  $connect = con();
  $sql = "SELECT * FROM `Stats`";
  $result = $connect->query($sql);
  $tableStats = $result->fetch_all(MYSQLI_ASSOC);
  if (isset($_POST['createStatsTech'])) {
    $connect = con();
    foreach ($_POST as $key => $value) {
      $$key = $connect->real_escape_string($value);
    }
    if($_POST['action'] == 'degat'){
      $sql = "INSERT INTO DegatTechnique
              (`id_technique`, `id_stats`, `Valeur`)
              VALUES ('$id_technique', '$stats', '$valeur');";
    }else{
      $sql = "INSERT INTO CoutTechnique
              (`id_technique`, `id_stats`, `Valeur`)
              VALUES ('$id_technique', '$stats', '$valeur');";
    }
    $result = $connect->query($sql);
    if ($result === false) {
      echo 'Erreur de sql: '. $connect->error;
    }
    $connect->close();
  }
?>
<form class="" action="" method="post">
  <input type="hidden" name="id_technique" value="<?= $_GET['id'] ?>">
  <div class="">
    <label for="">Action</label>
    <select class="btn btn-secondary" class="" name="action">
      <option value="degat">Dégât</option>
      <option value="cout">Coût</option>
    </select>
  </div>
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
    <input type="number" id="valeur" name="valeur" maxlenghth="4" min="-9999" max="9999" onchange="(this.value<=9999 && this.value>=-9999) ? bouton.disabled=false : bouton.disabled=true;" onkeyup="if(this.value>9999){this.value=999}else if(this.value<-9999){this.value=-999}" required />
  </div>
  <input class="btn btn-secondary" type="submit" id="bouton" name="createStatsTech" value="Créé" disabled />
</form>
