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

Route::get('/', function ($email = null) {
    /*if(!is_null($email)) {
        $user = \App\Models\User::byEmail($email);
        \App\Models\User::loginWEB($user);
        die('finished');
    }*/
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


/**
 * Работа с пользователями 
 */
Route::group([ 'prefix' => 'user' ], function() {

    // Выход
    Route::get('/logout', 'App\Http\Controllers\User\Logout\Request\Web@logout');

    // Пользователь не должен быть авторизован
    Route::group([ 'middleware' => 'WebNoAuth' ], function() {
        // Авторизация
        Route::get('/login/{ref?}', 'App\Http\Controllers\User\Login\Request\Web@form')->name('user.login');
        Route::post('/login/{ref?}', 'App\Http\Controllers\User\Login\Request\Web@login');
        // Регистрация
        Route::get('/register/{ref?}', 'App\Http\Controllers\User\Register\Request\Web@form')->name('user.register');
        Route::post('/register/{ref?}', 'App\Http\Controllers\User\Register\Request\Web@register');
        // Восстановление пароля
        Route::get('/recovery/{ref?}', 'App\Http\Controllers\User\Reqovery\Request\Web@form')->name('user.recovery');
        Route::post('/recovery/{ref?}', 'App\Http\Controllers\User\Reqovery\Request\Web@sendMail');
        Route::post('/recovery-instructions', 'App\Http\Controllers\User\Reqovery\Request\Web@instructions');
        Route::put('/recovery/{ref?}', 'App\Http\Controllers\User\Reqovery\Request\Web@updatePassword');
    });

    // Настройки. Пользователь должен быть авторизован
    Route::group([ 'prefix' => 'config', 'middleware' => 'WebAuth' ], function() {
        Route::get('/', function() { return redirect()->to('/user/config/email'); });
        Route::get('/email', 'App\Http\Controllers\User\Login\Request\Web@form')->name('user.config.email');
        Route::get('/password', 'App\Http\Controllers\User\Login\Request\Web@form')->name('user.config.password');
    });

});

/**
 * Информационные страницы
 */
Route::group([ 'prefix' => 'page' ], function() {
    
    Route::view('about', 'v1.pages.about', [
        'title' => \ui::t('О магазине'),
        'keywords' => \ui::t('Ключевые слова'),
        'description' => \ui::t('Описание страницы'),
    ])->name('page.about');

    Route::view('salesman', 'v1.pages.salesman', [
        'title' => \ui::t('Продавцам'),
        'keywords' => \ui::t('Ключевые слова'),
        'description' => \ui::t('Описание страницы'),
    ])->name('page.salesman');

    Route::view('buyer', 'v1.pages.buyer', [
        'title' => \ui::t('Покупателям'),
        'keywords' => \ui::t('Ключевые слова'),
        'description' => \ui::t('Описание страницы'),
    ])->name('page.buyer');

    Route::view('pay', 'v1.pages.pay', [
        'title' => \ui::t('Оплата'),
        'keywords' => \ui::t('Ключевые слова'),
        'description' => \ui::t('Описание страницы'),
    ])->name('page.pay');

});

Route::get('/tests', 'App\Http\Controllers\Controller@tests');