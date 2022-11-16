<?php
require_once __DIR__ . "/../autoloader.php";

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['acc_type'])) {
    $_SESSION['acc_type'] = "";
}


$router = new Router();


function login_handler(string $acc)
{
    if (isset($_SESSION['id']) and $_SESSION['acc_type'] == $acc) {
        header("location:../home/$acc");
    }
    require __DIR__ . "/views/login/$acc.phtml";
}

function home_handler(string $acc)
{
    if (!isset($_SESSION['id']) or $_SESSION['acc_type'] != $acc) {
        header("location:../login/$acc");
    }
    require __DIR__ . "/views/home/$acc.phtml";
}


$router->get('/', function () {
    header('location:./login/user');
});


$router->get('/login', function () {
    header('location:./login/user');
});

$router->get("/login/user", function () {
    login_handler('user');
});


$router->get("/login/staff", function () {
    login_handler('staff');
});

$router->get("/login/admin", function () {
    login_handler('admin');
});


$router->get('/home', function () {
    header('location:home/user');
});

$router->get('/home/user', function () {
    home_handler('user');
});

$router->get('/home/staff', function () {
    home_handler('staff');
});

$router->get('/home/admin', function () {
    home_handler('admin');
});


$router->add_not_found_handler(function () {
    require __DIR__ . '/views/notfound.phtml';
});


$router->run();


//