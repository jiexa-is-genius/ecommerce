<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $redis = new Predis\Client();// put setting here, if req);
    $redis->publish(['general'], json_encode(['Hello' => 'World']));

    return view('welcome');
});
