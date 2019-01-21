<?php
if (isset($_POST['connection'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "SELECT `Pseudo`, `Motdepasse` FROM `Utilisateur` WHERE `Pseudo` LIKE '$login'";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
    exit;
  }
  if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    if(password_verify($password.secretKey, $row['Motdepasse'])){
      $_SESSION['pseudo'] = $login;
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
  <div class="">
    <label for="">Pseudo</label>
    <input type="text" name="login" value="" />
  </div>
  <div class="">
    <label for="">Mot de passe<?php if (isset($error['password'])) { ?> <span class="error"><?= $error['password']; ?></span><?php } ?></label>
    <input type="text" name="password" value="" />
  </div>
  <button type="submit" name="connection">Connection</button>
</form>
