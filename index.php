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
require_once ('model/validate.php');

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
$f3->route('GET|POST /order', function($f3) {

    //if the form has been submitted
    if($_SERVER['REQUEST_METHOD']=='POST') {

        // get ther data  from the Post array
        $userFood = trim($_POST['food']);
        $userMeal = ($_POST['meal']);

        //if data is valid, store in session
        if(validFood($userFood)) {
            $_SESSION['food'] = $userFood;
        }
        //data is not valid, set error in f3 hive
        else {
            $f3->set('errors["food"]',"Food cannot be blank and must contain only characters.");
        }

        //
        if(validMeals($userMeal)) {
            $_SESSION['meal'] = $userMeal;
        }
        //data is not valid, set error in f3 hive
        else {
            $f3->set('errors["meal"]', "Please select a meal time.");
        }

        //if there are no errors, redirect to order2
        if(empty($f3->get('errors'))) {
            $f3->reroute('/order2');  //get
        }
    }

    $f3->set('meals', getMeals());
    $f3->set('userFood', isset($userFood) ? $userFood : "");
    $f3->set('userMeal', isset($userMeal) ? $userMeal : "");

    $view = new Template();
    echo $view->render('views/order.html');
});

//define an order 2  route
$f3->route('GET|POST /order2', function ($f3) {

    if($_SERVER['REQUEST_METHOD']=='POST') {
        if(isset($_POST['conds'])) {
            $userCondiments = $_POST['conds'];
            $_SESSION['conds'] = implode(" ", $userCondiments);
        }

        //send to the summary page
        $f3->reroute('/summary');
    }
    //if form beem submitted
    $f3->set('condiments', getCondiments());

    $view = new Template();
    echo $view->render('views/order2.html');
});

//define a summary  route
$f3->route('GET /summary', function () {

    $view = new Template();
    echo $view->render('views/summary.html');

    //write to database

    //clear session
    session_destroy();
});

//run fat free
$f3->run();