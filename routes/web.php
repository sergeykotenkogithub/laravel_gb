<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\AddNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FormBuy\FormBuyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
});

// авторизация

Route::get('/auth', [AuthorizationController::class, 'index']);

// auth

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', function () {
       \Auth::logout();
       return redirect()->route('login');
    })->name('logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('add', AddNewsController::class);

        Route::get('parser', ParserController::class)
            ->name('parser');
    });

});


//admin


//news

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');


Route::get('news/categories', [CategoriesController::class, 'categories'])
    ->name('news.categories');

Route::get('news/categories/{item}', [CategoriesController::class, 'item'])
//    ->where('id', '\d+')
    ->name('news.item');


Route::post('/news/store', [NewsController::class, 'store'])
    ->name('news.store');


// Форма

Route::get('form_buy/', [FormBuyController::class, 'create'])
//    ->where('id', '\d+')
    ->name('form_buy.create');

Route::post('form_buy/store', [FormBuyController::class, 'store'])
//    ->where('id', '\d+')
    ->name('form_buy.store');

Route::get('/collections', function () {
   $collect = collect([1, 3, 9, 2, 5, 112, 8]);
   dd($collect->min());
});



Route::get('/categories/news', [NewsController::class, 'index'])
    ->where('id', '\d+')
    ->name('news.item');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/start', [SocialController::class, 'start'])
        ->name('vk.start');
    Route::get('/vk/callback', [SocialController::class, 'callback'])
        ->name('vk.callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
