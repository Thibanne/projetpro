<?php
  if (isset($_POST['inscription'])) {
    $connect = con();
    foreach ($_POST as $key => $value) {
      $$key = $connect->real_escape_string($value);
    }
    $password = password_hash($password.secretKey, PASSWORD_BCRYPT);
    $sql = "INSERT INTO Utilisateur
            (`Nom`, `Prenom`, `Pseudo`, `Motdepasse`, `Mail`)
            VALUES ('$lastname', '$firstname', '$login', '$password', '$mail');";
    $result = $connect->query($sql);
    if ($result === false) {
      echo 'Erreur de sql: '. $connect->error;
    }
    $connect->close();
  }
require 'app/regexform.php';
?>
<!-- formulaire d'inscription -->
<form class="" action="?modal" method="post">
  <div class="form-row">
    <div class="col">
      <label for="lastname"><strong>Nom : </strong><?php if (isset($errorLastname)) { ?> <span class="error"><?= $errorLastname; ?></span><?php } ?></label></br>
      <input type="text" id="lastname" name="lastname" value="<?= isset($lastname) ? $lastname : ''; ?>" />
    </div>
    <div class="col">
      <label for="firstname"><strong>Prénom : </strong><?php if (isset($errorFirstname)) { ?> <span class="error"><?= $errorFirstname; ?></span><?php } ?></label></br>
      <input type="text" id="firstname" name="firstname" value="<?= isset($firstname) ? $firstname : ''; ?>" />
    </div>
    <div class="col">
      <label for="login"><strong>Pseudo : </strong><?php if (isset($errorLogin)) { ?> <span class="error"><?= $errorLogin; ?></span><?php } ?></label></br>
      <input type="text" id="login" name="login" value="<?= isset($login) ? $login : ''; ?>" />
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="password"><strong>Mot de passe : </strong><?php if (isset($errorpswd)) { ?> <span class="error"><?= $errorpswd; ?></span><?php } ?></label></br>
      <input type="password" id="password" name="password" value="<?= isset($pswd) ? $pswd : ''; ?>" />
    </div>
    <div class="col">
      <label for="password"><strong>Confirmation : </strong><?php if (isset($errorpswd)) { ?> <span class="error"><?= $errorpswd; ?></span><?php } ?></label></br>
      <input type="password" name="passwordRepeat" value="<?= isset($pswd) ? $pswd : ''; ?>" />
    </div>
    <div class="col">
      <label for="mail"><strong>E-mail : </strong><?php if (isset($errorMail)) { ?> <span class="error"><?= $errorMail; ?></span><?php } ?></label></br>
      <input type="email" id="mail" name="mail" value="<?= isset($mail) ? $mail : ''; ?>" />
    </div>
    <div class="col">
      <label for="mail"><strong>Confirmation : </strong><?php if (isset($errorMail)) { ?> <span class="error"><?= $errorMail; ?></span><?php } ?></label></br>
      <input type="email" name="mailRepeat" value="<?= isset($mail) ? $mail : ''; ?>" />
  </div>
</div>
<button class="btn btn-light btnResize" type="submit" name="inscription">Validé</button>
</form>
<form class="" action="?modal" method="post">
  <span>Déjâ inscrit ?</span>
  <button class="btn btn-link textLikeLink" type="submit" name="oldOne">Cliquez ici</button>
  <span>.</span>
</form>
