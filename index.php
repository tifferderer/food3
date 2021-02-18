<?php

//This is my CONTROLLER
/** Create a food order form */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//AUTOLOAD BEFORE SESSION START ALWAYS

//Start a session
session_start();

//Create an instance of Base class
$f3 = Base::instance();
$validator = new Validate();
$dataLayer = new DataLayer();
$order = new Order();
$controller = new Controller($f3);

$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    //echo "Hello";
    global $controller;
    $controller->home();
});

//define an order route
$f3->route('GET|POST /order', function($f3) {

    global $controller;
    $controller->order();
});

//define an order 2  route
$f3->route('GET|POST /order2', function ($f3) {

    global $controller;
    $controller->order2();
});

//define a summary  route
$f3->route('GET /summary', function () {

    global $controller;
    $controller->summary();
});

//run fat free
$f3->run();