<?php

require_once "../autoloader.php";

if (!isset($_SESSION)) {
    session_start();
}

$pass = $_POST['old_pass'];
$newpass = $_POST['new_pass'];
$acc_type = $_SESSION['acc_type'];

$ctrl = new_ctrl();


if (check_pass()) {
    update_pass();
    echo "success";
    return;
}
echo "Something went wrong :\n Invalid credentials";



function check_pass(): bool
{
    global $ctrl, $pass;

    $real_pass = $ctrl->select_data("Id=?", $_SESSION['id'])->fetch_assoc()['Password'];
    return (strcmp($pass, $real_pass) === 0);
}


function update_pass(): void
{
    global $ctrl, $newpass;
    $ctrl->update("Password = ?", $newpass, $_SESSION['id']);
}

function new_ctrl()
{
    global $acc_type;
    if ($acc_type == "user") return new UserCtrl;
    if ($acc_type == "staff") return new StaffCtrl;
    return new AdminCtrl;
}
