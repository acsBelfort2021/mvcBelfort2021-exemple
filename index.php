<?php

require 'vendor/autoload.php';

use App\Controllers\PageController;
use App\Controllers\MovieController;

//session_start();

$router = new AltoRouter();
$router->setBasePath('/mvcBelfort2021');

$router->map('GET', '/', function () {
    $controller = new PageController();
    $controller->index();
});

$router->map('GET', '/movie/show/[i:id]', function ($id) {
    $controller = new PageController();
    $controller->showMovie($id);
});

$router->map('GET', '/movie/edit/[i:id]', function($id){
    $controller = new MovieController();
    $controller->editMovie($id);
});

$router->map('POST', '/editMovie/[i:id]', function ($id) {
    $controller = new MovieController();
    $controller->editMovie($id);
});

$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}