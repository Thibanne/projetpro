<?php
$error = false;
/* on verifie les noms avec la regex */
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['mailRepeat'], $_POST['login'], $_POST['password'], $_POST['passwordRepeat'])) {
  /* Déclaration des variables en méthode POST */
  $lastname = htmlspecialchars($_POST['lastname']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $mail = htmlspecialchars($_POST['mail']);
  $mailr = htmlspecialchars($_POST['mailRepeat']);
  $login = htmlspecialchars($_POST['login']);
  $pswd = htmlspecialchars($_POST['password']);
  $pswdr = htmlspecialchars($_POST['passwordRepeat']);
  /* Si lastName n'est pas vide... */
  if (!empty($lastname)) {
    /* Vérifie si lastName est conforme à la regex, sinon affiche 'Mauvais caractère */
    if (!isNameValid($lastname)) {
      $errorLastname = 'Caractère non supporté';
      $error = true;
    }
  } else { /* Sinon affiche 'le champ est vide */
    $errorLastname = 'le champ est vide';
    $error = true;
  }
  if (!empty($firstname)) {
    if (!isNameValid($firstname)) {
      $errorFirstname = 'Caractère non supporté';
      $error = true;
    }
  } else {
    $errorFirstname = 'le champ est vide';
    $error = true;
  }
  if (!empty($mail)) {
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

      if (!($mail == $mailr)) {
        $errorMail = 'les adresses mail ne correspondent pas';
        $error = true;
      }
    } else {
      $errorMail = 'Adresse mail non conforme';
      $error = true;
    }
  } else {
    $errorMail = 'Le champ est vide';
    $error = true;
  }
  if (!empty($login)) {
    if (!isLoginValid($login)) {
      $errorLogin = 'Le pseudo ne peut avoir plus d\'un "." ou "/"';
      $error = true;
    }else if(isLoginTaken() === true){
      $errorLogin = 'Le pseudo '.$login.' est déja pris';
      $error = true;
    }
  } else {
    $errorLogin = 'le champ est vide';
    $error = true;
  }
  if (!empty($pswd)) {
    if (!($pswd == $pswdr)) {
      $errorpswd = 'les mots de passe ne correspondent pas';
      $error = true;
    }
    if (strlen($pswd) < 8) {
      $errorpswd = 'le mot de passe est trop court, minimum 8 caractères';
      $error = true;
    }
    if (strlen($pswd) > 16) {
      $errorpswd = 'le mot de passe est trop long, maximum 16 caractères';
      $error = true;
    }
  } else {
    $errorpswd = 'le champ est vide';
    $error = true;
  }
}
?>
