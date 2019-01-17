<?php
if (isset($_POST['connection'])) {
  $connect = con();
  foreach ($_POST as $key => $value) {
    $$key = $connect->real_escape_string($value);
  }
  $sql = "SELECT `Pseudo`, `MotDePasse` FROM `Utilisateur` WHERE `Pseudo` LIKE '$login' AND `MotDePasse` LIKE '$password'";
  $result = $connect->query($sql);
  if ($result === false) {
    echo 'Erreur de sql: '. $connect->error;
  }
  if($result->num_rows == 1){
    $_SESSION['pseudo'] = $login;
    $_SESSION['joueur'] = [
      'PV' => 100,
      'mana' => 100,
      'stun' => 0
    ];
    header('Location: /');
  }
  $connect->close();
}


?>
<!-- formulaire de connection -->
<form class="" action="?page" method="post">
  <div class="">
    <label for="">Pseudo</label>
    <input type="text" name="login" value="" />
  </div>
  <div class="">
    <label for="">Mot de passe</label>
    <input type="text" name="password" value="" />
  </div>
  <button type="submit" name="connection">Connection</button>
</form>
