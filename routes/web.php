<?php

use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/hello_world', fn() => view('hello_world'));

Route::get('/hello', fn() => view('hello', [
    'name' => '大西',
    'course' => 'laravel'
]));

Route::get('/', fn() => view('index'));
Route::get('/curriculum', fn() => view('curriculum'));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldtime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyhall']);

// Form
Route::get('/form', [RequestController::class, 'form']);

// query-request
Route::get('/query-string', [RequestController::class, 'queryString']);

//ID
Route::get('/users/{id}', [RequestController::class, 'profile'])->name('profile');
Route::get('/route-link', [RequestController::class, 'routeLink']);
//
Route::get('/product/{category}/{year}', [RequestController::class, 'productsArchive']);

//ログイン画面表示
Route::get('/login', [RequestController::class, 'loginform']);
Route::post('/login', [RequestController::class, 'login'])->name('login');

//イベント
Route::resource('/events', EventController::class,)->only(['create', 'store']);

Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

//ファイル管理
Route::resource('/photos', PhotoController::class)->only('create', 'store','show');
