<?php

require_once "../autoloader.php";


$id = $_POST['Id'];
$ctrl = new UserCtrl;



$ctrl ->delete($id);
