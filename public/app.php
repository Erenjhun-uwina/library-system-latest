<?php
require_once __DIR__ . "/../autoloader.php";

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['acc_type'])) {
    $_SESSION['acc_type'] = "";
}

$acc_type = $_SESSION['acc_type'];
$uri = $_SERVER['REQUEST_URI'];

Router::get('/', function () {
    header('location:./login/'.($_SESSION['acc_type']?:"user" ));
});



Router::get('/login', function () {
    header('location:./login/'.($_SESSION['acc_type']?:"user" ));
});

Router::get("/login/user", function () {
    login_handler('user');
});


Router::get("/login/staff", function () {
    login_handler('staff');
});

Router::get("/login/admin", function () {
    login_handler('admin');
});


Router::get('/home', function () {
    header('location:home/'.($_SESSION['acc_type']?:"user" ));
});

Router::get('/home/user', function () {
    home_handler('user');
});

Router::get('/home/staff', function () {
    home_handler('staff');
});

Router::get('/home/admin', function () {
    home_handler('admin');
});

Router::get('/home/about_us',function(){
    view("home/about_us");
});

// var_dump($_SERVER['']);

Router::get(substr($uri,strpos($uri,"/transaction")),function(){
    if (!isset($_SESSION['id']) or $_SESSION['acc_type'] == 'user') {
        header("location:../notfound");
    }
    view('home/transaction');
});

Router::get("/user/shelf",function(){
    if (!isset($_SESSION['id']) or $_SESSION['acc_type'] != 'user') {
        header("location:../notfound");
    }
    view("shelf/user_shelf");
});

Router::add_not_found_handler(function () {
    view("notfound");
});


Router::run();

// ##########################################
function login_handler(string $acc)
{
    if (isset($_SESSION['id']) and $_SESSION['acc_type'] == $acc) {
        header("location:../home/$acc");
    }
    view("login/$acc");
}

function home_handler(string $acc)
{
    if (!isset($_SESSION['id']) or $_SESSION['acc_type'] != $acc) {
        header("location:../login/$acc");
    }
    view("home/$acc");
}


//