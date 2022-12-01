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

Route::get('/send', function () {
    Redis::publish('csub', json_encode([
        'event' => 'chat.message',
       // 'to' => ['TQL51NOZaGd-7sT6AAAD'],
        'body' => ['MyBody' => 'Hello World'],
    ]));
});

Route::get('/{email?}', function ($email = null) {
    if(!is_null($email)) {
        $user = \App\Models\User::byEmail($email);
        \App\Models\User::loginWEB($user);
        die('finished');
    }
    /*\App\Models\User::insert([
        'email' => 'jiexa-is-genius@mail.ru',
        'password' => 'qW4rby16*',
    ]);

    \App\Models\User::insert([
        'email' => 'kartelpvl@yandex.kz',
        'password' => 'qW4rby16*',
    ]);*/
    /*Cache::put('key', 'my key');
    die();
    $socket = new \socket;
    $clients = $socket->clientsByUID();*/

    return view('welcome');
});
