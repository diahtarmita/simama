<?php

use Illuminate\Routing\Router;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
    //'middleware'    => ['permission:edit-post,create-post,delete-post'], // Menambahkan middleware permission

], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('opd', OpdController::class); 
    $router->resource('bidang', BidangController::class);
    $router->resource('lemdik', LemdikController::class);
    $router->resource('peserta', PesertaController::class);
    $router->resource('catatan', CatatanController::class);
   // $router->resource('posts', PostController::class);

    $router->get('api/bidang_id', 'PesertaController@bidang_id');
});
