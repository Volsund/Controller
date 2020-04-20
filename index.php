<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;

use Medoo\Medoo;


$databaseConfig = require_once __DIR__ . '/config/configdata.php';

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {

    $router->addRoute('GET', '/', 'CountriesController@index');

    $router->addRoute('GET', '/countries/{id:\d+}', 'CountriesController@show');

    $router->addRoute('POST', '/', 'CountriesController@addCountry');

    $router->addRoute('POST', '/countries/{id:\d+}', 'CountriesController@addCity');


});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];
        // ... call $handler with $vars

        [$controller, $method] = explode('@', $handler);


        $controllerPath = '\App\Controllers\\' . $controller;
        echo (new $controllerPath)->{$method}($params);


        break;
}