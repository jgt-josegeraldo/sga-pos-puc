<?php

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

$router->group(['prefix' => 'api', 'middleware' => 'session'], function () use ($router) {
    $router->POST('/login', 'UserController@login');
    $router->POST('/logout', 'UserController@logout');

    $router->group(['prefix' => 'asset', 'middleware' => 'auth'], function () use ($router) {
        $router->POST('/save', 'AssetController@save');
        $router->GET('/{assetId}', 'AssetController@get');
        $router->GET('/list', 'AssetController@list');
        $router->GET('/listCategory', 'AssetController@listCategory');
        $router->GET('/listStatus', 'AssetController@listStatus');
        $router->GET('/listWebhooks', 'AssetController@listWebhooks');
        $router->GET('/listTriggers', 'AssetController@listTriggers');
    });
});
