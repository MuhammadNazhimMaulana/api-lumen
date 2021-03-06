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

$router->post('login', ['uses' => 'Api\Auth\AuthController@login']);
$router->post('register', ['uses' => 'Api\Auth\AuthController@register']);

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function() use ($router){

    // Kategori
    $router->group(['prefix' => 'category'], function () use ($router){
        $router->get('/', ['uses' => 'Api\CategoryController@index']);
        $router->get('/{id}', ['uses' => 'Api\CategoryController@view']);
        $router->post('/', ['uses' => 'Api\CategoryController@insert']);
        $router->delete('/{id}', ['uses' => 'Api\CategoryController@delete']);
        $router->put('/{id}', ['uses' => 'Api\CategoryController@update']);
    });

    // Pelanggan
    $router->group(['prefix' => 'pelanggan'], function () use ($router){
        $router->get('/', ['uses' => 'Api\PelangganController@index']);
        $router->get('/{id}', ['uses' => 'Api\PelangganController@view']);
        $router->post('/', ['uses' => 'Api\PelangganController@insert']);
        $router->delete('/{id}', ['uses' => 'Api\PelangganController@delete']);
        $router->put('/{id}', ['uses' => 'Api\PelangganController@update']);
    });

    // Menu
    $router->group(['prefix' => 'menu'], function () use ($router){
        $router->get('/', ['uses' => 'Api\MenuController@index']);
        $router->get('/{id}', ['uses' => 'Api\MenuController@view']);
        $router->post('/', ['uses' => 'Api\MenuController@insert']);
        $router->delete('/{id}', ['uses' => 'Api\MenuController@delete']);
        $router->put('/{id}', ['uses' => 'Api\MenuController@update']);
    });

});
