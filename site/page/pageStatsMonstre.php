<?php
if($_GET['page'] == 'creer-statsMonstre'){
  require urlAdminStatsMonstre.'createStatsMonstre.php';
}else if($_GET['page'] == 'liste-monstreStats'){
  require urlAdminStatsMonstre.'listeMonstreStats.php';
}else if($_GET['page'] == 'modify-statsMonstre'){
  require urlAdminStatsMonstre.'formModStatsMonstre.php';
}
?>
