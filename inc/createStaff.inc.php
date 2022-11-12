<?php

require_once "../autoloader.php";

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$pword = $_POST['password'];
$uname = $_POST['username'];

$ctrl = new StaffCtrl;
$s = $ctrl;


echo create();


function is_available(){
    global $s,$uname;

    $result = $s->select_data("Username",$uname)->fetch_assoc();
    if($result) return "This Username is already registered to an accocunt";
    return true;
}

function create()
{
    global $s,$fn, $ln, $pword, $uname;

    $is_avail = is_available();

    if ($is_avail===true) {
        $id = $s->create($fn, $ln, $pword, $uname);
        if ($id)return "success";
    }

    return $is_avail;
}
