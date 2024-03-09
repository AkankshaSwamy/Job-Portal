<?php

include_once('../config.php');
session_start();
$notifycount=0;
function notify()
{


    if ($_SESSION['status'] == 0) {
        $GLOBALS['notifycount'] += 1;
        ?>

        
    <?php }
}
function eventjobapplied(){

}
?>