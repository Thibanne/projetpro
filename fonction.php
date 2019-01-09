<?php

function jdc($journaldecombat){
  $_SESSION['journaldecombat'][$_SESSION['tour']-1][] = $journaldecombat;
}

?>
