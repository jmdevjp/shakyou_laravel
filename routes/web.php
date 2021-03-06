<?php

use Illuminate\Support\Facades\Event;
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
    $view = view('welcome');
    Event::dispatch(new App\Events\PublishProcessor(1));
    return $view;
});

Route::get('/home', function () {
    return view('home');
});

use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

use App\Http\Controllers\TextAction;
use App\Http\Controllers\ViewAction;
use App\Http\Controllers\JsonAction;
use App\Http\Controllers\DownloadAction;
use App\Http\Controllers\RedirectAction;
use App\Http\Controllers\StreamAction;

Route::get('/text', TextAction::class);
Route::get('/view', ViewAction::class);
Route::get('/json', JsonAction::class);
Route::get('/dl', DownloadAction::class);
Route::get('/redirect', RedirectAction::class);
Route::get('/stream', StreamAction::class);

use App\Http\Controllers\ArticlePayloadAction;

Route::get('/payload', ArticlePayloadAction::class);

use Illuminate\Support\Facades\Artisan;

Route::get('/no_args', function() {
    Artisan::call('hello:class hoge');
});

use Illuminate\Contracts\Console\Kernel;

Route::get('/no_args_di', function (Kernel $artisan) {
    $artisan->call('hello:class fuga --switch');
});
