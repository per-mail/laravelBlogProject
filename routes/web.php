<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace'=> 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::get('/test', 'App\Http\Controllers\Test\UserController@index')->name('test.index');

// вывод постов на сайте
Route::group(['namespace'=> 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
//  вложенный маршрут (nested rout) для комментариев к посту
    Route::group(['namespace'=> 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
//  вложенный маршрут (nested rout) для лайков к посту
    Route::group(['namespace'=> 'Like', 'prefix' => '{post}/likes'], function () {
            Route::post('/', 'StoreController')->name('post.like.store');
    });
});

// вывод меню категорий на сайте
Route::group(['namespace'=> 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    //  вложенный маршрут (nested rout) для категорий
    Route::group(['namespace'=> 'Post', 'prefix' => '{category}/posts'], function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});

//'middleware' => ['auth', 'admin'] -  проверяем пользователей зашедших на сайт авторизованы ли они при помощи 'auth'
Route::group(['namespace'=> 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function () {
// когда делаем отправку письма пользователю при регистрации пишем
//Route::group(['namespace'=> 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth',  'verified']], function () {
    Route::group(['namespace'=> 'Main', 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace'=> 'Liked', 'prefix' => 'likeds'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace'=> 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});

// 'middleware' => ['auth', 'admin'] - сначала проверяем пользователей зашедших на сайт авторизованы ли они при помощи 'auth', далее 'admin' проверяет наличие прав админа у пользователя
Route::group(['namespace'=> 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
// когда делаем отправку письма пользователю при регистрации пишем
//    Route::group(['namespace'=> 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace'=> 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.main.index');
        });

    Route::group(['namespace'=> 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace'=> 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace'=> 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace'=> 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

});
// роуты register, logout, login их контроллеры находятся в Controllers в папке Auth
Auth::routes();

//  отправка письма пользователю при регистрации
//Auth::routes(['verify' => true]);

// подключаем капчу https://morioh.com/p/39ee35ef82ea
use App\Http\Controllers\GoogleV3CaptchaController;
 
Route::get('google-v3-recaptcha', [GoogleV3CaptchaController::class, 'index']);
Route::post('validate-g-recaptcha', [GoogleV3CaptchaController::class, 'validateGCaptch']);