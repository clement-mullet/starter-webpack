<?php
require './vendor/autoload.php';
require_once('config/config.php');
require('src/Controllers/HomeController.php');
session_start();

use App\Controllers\HomeController;
use App\Controllers\TestController;




date_default_timezone_set('Europe/Paris');

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->setBasePath(ROOT);

/**
 * 
 * START OF ROUTES 
 * 
 */

// Get possible user
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

// Check if user is connected
if ($user_id) {
  // Access to logged pages only
  // For exemple : account pages
}

// Else redirect to signup
else {
  // SIGNUP
}

$router->map('GET', '/', function () {
  HomeController::homePage();
}, "home");

// Get match object to see if a route has been matched
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  // no route was matched
  header('Location: ' . ROOT);
}
