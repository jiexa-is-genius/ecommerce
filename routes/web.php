<?php use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Pages\Frontpage\Web@show')->name('pages.frontpage');


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