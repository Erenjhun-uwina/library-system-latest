<?php

require_once "../autoloader.php";
if (!isset($_SESSION)) {
    session_start();
}


$id = $_POST['id'];

$bctrl = new BookCtrl;
$tctrl = new TransactionCtrl;

$book = $bctrl->select_data('Id=? LIMIT 1', $id)->fetch_assoc();

$code = $tctrl->select_data("Book = ? AND Borrower = ?", [$id, $_SESSION['id']])->fetch_assoc();

if ($code) {
    $book['Code'] = $code['Code'];
}

$book_json = json_encode($book);

print_r($book_json);
