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

// routes/web.php
$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/mahasiswa', 'MahasiswaController@index');
    $router->get('/prodi', 'ProdiController@index');
    $router->get('/mahasiswa/prodi/{prodi_id}', 'MahasiswaController@filterByProdi');
    $router->get('/matkul', 'MatakuliahController@index');
    $router->post('/matkul/tambah', 'MatakuliahController@addCourse'); 
    $router->get('/matkul/{id}', 'MatakuliahController@myCourses'); // Ini akan mengambil ID dari URL, tetapi logikanya untuk pengguna login 
});
