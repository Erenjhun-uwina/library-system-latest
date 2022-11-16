<?php

require_once "../autoloader.php";

$type =$_POST['type'];
$code = $_POST["$type"."_code"];

$bctrl = new BookCtrl;
$tctrl = new TransactionCtrl;

($type."_book")();


function return_book(){
    global $bctrl,$code;
    //delete transaction 
    // udpate books available amount
    echo "return a book";
}

function borrow_book(){
    global $bctrl,$code;
    // create a transaction
    // udpate books available amount
    
    // $trcrl->update();

    echo "borrow a book";
}