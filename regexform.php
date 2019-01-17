<?php
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
    }
  } else { /* Sinon affiche 'le champ est vide */
    $errorLastname = 'le champ est vide';
  }
  if (!empty($firstname)) {
    if (!isNameValid($firstname)) {
      $errorFirstname = 'Caractère non supporté';
    }
  } else {
    $errorFirstname = 'le champ est vide';
  }
  if (!empty($mail)) {
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

      if (!($mail == $mailr)) {
        $errorpswd = 'les adresses mail ne correspondent pas';
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
      $errorLogin = 'Le pseudo ne peut plus d\'un "." ou "/"';
    }
  } else {
    $errorLogin = 'le champ est vide';
    $error = true;
  }
  if (!empty($pswd)) {
    if (!($pswd == $pswdr)) {
      $errorpswd = 'les mots de passe ne correspondent pas';
    }
  } else {
    $errorpswd = 'le champ est vide';
    $error = true;
  }
}
?>
