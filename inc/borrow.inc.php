<?php

require_once "../autoloader.php";


$book_id = $_POST['book_id'];

$tctrl = new TransactionCtrl;


function create_transaction(){
    global $tctrl;

    $tctrl->create();
}