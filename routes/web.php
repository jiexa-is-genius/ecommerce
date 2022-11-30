<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
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
    Redis::publish('csub', json_encode([
        'event' => 'chat.message',
        'to' => [1, 2, 3],
        'body' => ['MyBody' => 'Hello World'],
    ]));
});

Route::get('/send', function () {
   

    return view('welcome');
});
