<?php

require_once "../autoloader.php";

$title = $_POST['title'];
$author= $_POST['author'];
$daterelease = $_POST['date_release'];
$genre = $_POST['genre'];


$publisher = $_POST['publisher'];
$language = $_POST['language'];

$ctrl = new BookCtrl;
$s = $ctrl;


echo create();

function is_available(){
    global $s,$title,$ctrl;

    $result = $s->select_data("Title = ?",$title)->fetch_assoc();
    
    if($result) return "This Book is already added";
    return true;
}

function create()
{
    global $ctrl,$title, $author, $daterelease, $genre, $publisher, $language;

    $coverimg = uploadImage();

    $is_avail = is_available();

    if ($is_avail===true) {
        $id = $ctrl->create( $title, $author, $daterelease, $genre, $coverimg, $publisher, $language);
        if ($id)return "success";
    }

    return $is_avail;
}

function uploadImage(){

    $file = $_FILES['cover_img'];
    $ext = explode(".",$file['name']);  
    $ext = strtolower(end($ext));
    $date = date('YmdHis');
    $rand1 = rand(0,10);
    $rand2 = rand(0,5);
    

    $new_file_name = "book.png";

    if($ext) $new_file_name = "$rand1$date$rand2.$ext";
    $path = '../src/assets/covers';

    move_uploaded_file($file['tmp_name'],"$path/$new_file_name");
    return $new_file_name;
}
