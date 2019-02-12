<?php
if($_GET['page'] == 'creer-techMonstre'){
  require urlAdminTechMonstre.'createTechMonstre.php';
}else if($_GET['page'] == 'liste-techMonstre'){
  require urlAdminTechMonstre.'listeTechMonstre.php';
}
?>
