<?php

require_once "../autoloader.php";

$id = $_POST['id'];

$bctrl = new BookCtrl;

$book = $bctrl->select_data('Id=? LIMIT 1',$id);
$book_json = json_encode($book->fetch_assoc());

print_r($book_json);