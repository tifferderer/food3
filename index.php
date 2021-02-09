<?php

//This is my CONTROLLER
/** Create a food order form */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//require the autoload file
require_once('vendor/autoload.php');
require_once ('model/data-layer.php');

//Create an instance of Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/home.html');
});

//define an order route
$f3->route('GET /order', function($f3) {

    $f3->set('meals', getMeals());

    $view = new Template();
    echo $view->render('views/order.html');
});

//define an order 2  route
$f3->route('POST /order2', function ($f3) {

    $f3->set('condiments', getCondiments());
    var_dump($_POST);
    if(isset($_POST['food'])) {
        $_SESSION['food'] = $_POST['food'];
    }
    if(isset($_POST['meal'])) {
        $_SESSION['meal'] = $_POST['meal'];
    }
    $view = new Template();
    echo $view->render('views/order2.html');
});

//define a summary  route
$f3->route('POST /summary', function () {
    var_dump($_POST);

    if(isset($_POST['conds'])) {
        $_SESSION['conds'] = implode(" ", $_POST['conds']);
    }

    $view = new Template();
    echo $view->render('views/summary.html');
});

//run fat free
$f3->run();