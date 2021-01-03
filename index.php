<?php

require 'vendor/autoload.php';

use Config\Config;
/* liste des Controllers exemple que l'on utilise */
use App\Controllers\PageController;
use App\Controllers\MovieController;
/* fin dex Controller exemple */

//session_start();

$router = new AltoRouter();
$router->setBasePath(Config::getBasePath());

/* routes d'exemple avec AltoRouter */
$router->addMatchTypes(array('s' => '[a-zA-Z]*'));

$router->map('GET', '/hello/[s:name]?', function($name){
    $controller = new PageController();
    $controller->hello($name);
});

$router->map('GET', '/movie/show/[i:id]', function ($id) {
    $controller = new MovieController();
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

$router->map('GET', '/', function () {
    $controller = new PageController();
    $controller->index();
});
/* fin des routes d'exemple */

$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    //header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    $controller = new PageController();
    $controller->error404();
}