<?php
if($_GET['page'] == 'creer-statsTechnique'){
  require urlAdminStatsTech.'createStatsTech.php';
}else if($_GET['page'] == 'modify-statsTechDegat'){
  require urlAdminStatsTech.'formModStatsTechDegat.php';
}else if($_GET['page'] == 'modify-statsTechCout'){
  require urlAdminStatsTech.'formModStatsTechCout.php';
}else if($_GET['page'] == 'liste-techniqueStats'){
  require urlAdminStatsTech.'listeTechniqueStats.php';
}
?>
