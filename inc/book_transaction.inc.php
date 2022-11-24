<?php

require_once "../autoloader.php";


$code = $_POST["transaction_code"];

$tctrl = new TransactionCtrl;

$res= $tctrl->select_data('Code=?',$code)->fetch_assoc();


$status = $res['Status'];
$new_status = ($status=="unresolved")?"lent":"returned";

$response = $tctrl->update("Status=?","Code=?",[$new_status,$code]);

if($response)echo "success";