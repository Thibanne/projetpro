<?php
if($_GET['page'] == 'creer-technique'){
  require urlAdminTechnique.'formCreateTechnique.php';
}else if($_GET['page'] == 'modify-technique'){
  require urlAdminTechnique.'formModTechnique.php';
}else if($_GET['page'] == 'liste-technique'){
  require urlAdminTechnique.'listeTechnique.php';
}
?>
