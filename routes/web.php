<?php


use App\Http\Controllers\NewsController;
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
    return view('welcome');
});

Route::group(['prefix' => ''], static function() {
    Route::get('/news', [NewsController::class, 'index'])
     ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
        ->name('news.show');
 });

 Route::get('/catigory_news', [NewsController::class, 'index'])
        ->name('catigory_news');

Route::get('/catigory_news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
        ->name('catigory_news.show');