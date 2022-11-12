<?php

require_once "../autoloader.php";

$studno = $_POST['Studno'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];

$grdsec = $_POST['grade/section'];
$email = $_POST['email'];
$connum = $_POST['contact_no'];
$ctrl = new UserCtrl;

echo create();

function is_available(){
    global $ctrl,$studno;

    $result = $ctrl->select_data("Student_no",$studno)->fetch_assoc();
    if($result) return "This student number is already registered to an accocunt";
    return true;
}

function create()
{
    global $ctrl,$fn, $ln, $studno, $studno, $grdsec, $email, $connum;

    $is_avail = is_available();

    if ($is_avail===true) {
        $id = $ctrl->create($fn, $ln, $studno, $studno, $grdsec, $email, $connum);
        if ($id)return "success";
    }

    return $is_avail;
}
