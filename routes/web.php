<?php

use Illuminate\Support\Facades\Route;

use gpacks\libs\ui;

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
    return view('welcome');
});

Route::get('/test-pack', function () {
    
    $pack = ui::t('My first lib');
    
    dd($pack);

});
