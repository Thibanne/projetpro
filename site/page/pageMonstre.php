<?php
if($_GET['page'] == 'creer-monstre'){
  require urlAdminMonstre.'formCreateMonstre.php';
}else if($_GET['page'] == 'modify-monstre'){
  require urlAdminMonstre.'formModMonstre.php';
}else if($_GET['page'] == 'liste-monstre'){
  require urlAdminMonstre.'listeMonstre.php';
}
?>
