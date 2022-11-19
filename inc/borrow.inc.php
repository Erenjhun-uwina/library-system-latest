<?php

require_once "../autoloader.php";
if (!isset($_SESSION)) {
    session_start();
}

$book_id = $_POST['book_id'];
$user_id = $_SESSION['id'];
$tctrl = new TransactionCtrl('transactions');

create_transaction();

function create_transaction(){
    global $tctrl,$user_id,$book_id;

    $borrower = $user_id;
    $book = $book_id;
    $date =date('m-d-Y');
    $code = generate_code();
    $status = "unresolved";

    $tctrl->create($borrower,$book,$date,$code);
    echo $code;
}

function generate_code():string{
    global $user_id,$book_id;

    $alpha_len = 24;
    $rand1 = tochr(rand(0,$alpha_len));
    $rand2 = tochr(rand(0,$alpha_len));

    return hash('crc32b',"$rand1$user_id$book_id$rand2".date('dmYH'));
}

function tochr(int $i){
    return chr(65+$i);
}