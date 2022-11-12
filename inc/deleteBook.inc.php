<?php

require_once "../autoloader.php";


$id = $_POST['Id'];
$ctrl = new BookCtrl;



$ctrl ->delete($id);
