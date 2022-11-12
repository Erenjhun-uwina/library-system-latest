<?php

if (!isset($_SESSION)) {
    session_start();
}
$acctype = $_SESSION['acc_type'];

$_SESSION['id']=null;
$_SESSION['acc_type'] =null;




echo "../login/$acctype";




