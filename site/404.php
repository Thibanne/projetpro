<?php session_start();
  // print_r($_SESSION);
  // exit;
  require '../app/fonction.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/jquery-ui" />
  <link rel="stylesheet" href="assets/css/jquery-ui-structure" />
  <link rel="stylesheet" href="assets/css/jquery-ui-theme" />
  <link rel="stylesheet" href="assets/css/404.css" />
<title>GOHO?</title>
</head>
<body>
  <div id="back404" class="">    
  <p id="nom" class="texte-font">
    <?php if (isConnected()){ ?>
      <a href="/"><?= $_SESSION['pseudo'] ?></a>
    <?php }else{ ?>
      <a href="/">NoOne</a>
    <?php } ?>
  </p>
  <p id="pnf" class="texte-font">Page not found</p>
  <p id="bubble" class="texte-font"></p>
</div>
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="assets/js/fonction.js"></script>
  <script>
    var showText = function(target, message, index, interval) {
      if (index < message.length) {
        $(target).append(message[index++]);
        setTimeout(function() {
          showText(target, message, index, interval);
        }, interval);
      }
    }
    $(function() {
      showText("#bubble", "I am error 404.", 0, 120);
    });
  </script>
</body>
</html>
