<?php

require_once "../autoloader.php";


$code = $_POST["transaction_code"];

$tctrl = new TransactionCtrl;

$res= $tctrl->select_data('Code=?',$code)->fetch_assoc();

$transaction_details = json_encode($res);


print_r($transaction_details);
