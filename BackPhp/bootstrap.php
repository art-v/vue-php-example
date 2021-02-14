<?php

require_once 'vendor/autoload.php';

use Laminas\Diactoros\ResponseFactory;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new ResponseFactory();

$strategy = new League\Route\Strategy\JsonStrategy($responseFactory, JSON_UNESCAPED_UNICODE);
$router = (new League\Route\Router)->setStrategy($strategy);

// map a route
$router->map('GET', '/post', [App\Controllers\PostController::class, 'index']);
$router->map('GET', '/post/{id}', [App\Controllers\PostController::class, 'show']);
$router->map('POST', '/post', [App\Controllers\PostController::class, 'store']);
$router->map('GET', '/install', [App\Controllers\InstallController::class, 'install']);

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);