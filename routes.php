<?php

use Bramus\Router\Router;
use Namdo24\Ezcode\Controllers\Admin\AdminHomeController;
use Namdo24\Ezcode\Controllers\Admin\AuthenticateController;
use Namdo24\Ezcode\Controllers\Client\ClientHomeController;
use Namdo24\Ezcode\Controllers\Admin\CourseController;
use Namdo24\Ezcode\Controllers\Admin\CategoryController;

$router = new Router();
$router->get('/', ClientHomeController::class . '@index');
$router->get('/admin', AdminHomeController::class . '@index');


$router->mount('/admin', function () use ($router) {
    $router->mount('/course', function () use ($router) {
        $router->get('/',                           CourseController::class . '@index');
        $router->get('/{id}/show',                  ClientHomeController::class . '@show');
        $router->get('/{id}/list',                  ClientHomeController::class . '@list');
        $router->get('/{id}/delete',                CourseController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CourseController::class . '@update');
        $router->match('GET|POST', '/create',       CourseController::class . '@create');
    });
    $router->mount('/category', function () use ($router) {
        $router->get('/',                           CategoryController::class . '@index');
        $router->get('/{id}/delete',                CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CategoryController::class . '@update');
        $router->match('GET|POST', '/create',       CategoryController::class . '@create');
    });
});

$router->mount('/course', function () use ($router) {
    $router->get('/{id}/show',                  ClientHomeController::class . '@show');
    $router->get('/{id}/list',                  ClientHomeController::class . '@list');
});
$router->match('GET|POST', '/auth/login',       AuthenticateController::class . '@login');

$router->get('/auth/logout',                            AuthenticateController::class . '@logout');
$router->before('GET|POST',"/admin/*",function(){
    if(!isset($_SESSION['user'])){
        header('Location: /auth/login');
    }
});
$router->before('GET|POST',"/admin/.*",function(){
    if(!isset($_SESSION['user'])){
        header('Location: /auth/login');
    }
});
$router->run();
