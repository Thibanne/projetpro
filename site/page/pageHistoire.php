<?php
if($_GET['page'] == 'histoire'){
  require urlhistoire.'worldMap.php';
}else if($_GET['page'] == 'lieu-0'){
  require urlhistoire.'lieu0.php';
}else if($_GET['page'] == 'lieu-1'){
  require urlhistoire.'lieu1.php';
}
?>
