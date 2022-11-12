<?php

require_once "../autoloader.php";


$id = $_POST['Id'];
$ctrl = new StaffCtrl;



$ctrl ->delete($id);
