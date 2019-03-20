<?php
if (isset($_POST['connection'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "SELECT `id`, `Pseudo`, `Motdepasse` FROM `Utilisateur` WHERE `Pseudo` LIKE '$login'";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
    exit;
  }
  if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    if(password_verify($password.secretKey, $row['Motdepasse'])){
      $_SESSION['pseudo'] = $login;
      $_SESSION['id'] = $row['id'];
      $_SESSION['joueur'] = [
        'PV' => 100,
        'mana' => 100,
        'stun' => 0
      ];
      $connect->close();
      header('Location: /');
    }
    $error['password']='Pas le bon mot de passe';
  }
  $connect->close();
}
?>
<!-- formulaire de connection -->
<form class="" action="?modal" method="post">
  <div class="form-row">
    <div class="col">
      <label>Pseudo</label>
      <input type="text" name="login" value="" required />
    </div>
    <div class="col">
      <label>Mot de passe<?php if (isset($error['password'])) { ?> <span class="error"><?= $error['password']; ?></span><?php } ?></label>
      <input type="password" name="password" value="" required />
    </div>
  </div>
  <button class="btn btn-light btnResize" type="submit" name="connection">Connection</button>
</form>
<form class="" action="?modal" method="post">
  <span>Pas encore inscrit ?</span>
  <button class="btn btn-link textLikeLink" type="submit" name="newOne">Cliquez ici</button>
  <span>.</span>
</form>
