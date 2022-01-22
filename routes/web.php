<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('category', 'Api\CategoryController@index');
$router->get('category/{id}', 'Api\CategoryController@view');
$router->post('category', 'Api\CategoryController@insert');
$router->delete('category/{id}', 'Api\CategoryController@delete');
$router->put('category/{id}', 'Api\CategoryController@update');