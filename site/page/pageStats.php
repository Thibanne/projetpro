<?php
if($_GET['page'] == 'creer-stats'){
  require urlAdminStats.'formCreateStats.php';
}else if($_GET['page'] == 'modify-stats'){
  require urlAdminStats.'formModStats.php';
}else if($_GET['page'] == 'liste-stats'){
  require urlAdminStats.'listeStats.php';
}
?>
