<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddSellerPersonController;
use App\Http\Controllers\SubscribeDealerController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('addsellerPerson', AddSellerPersonController::class);
Route::resource('subscribedealer', SubscribeDealerController::class);

Route::get('/sellerPerson', function () {
    return view('sellerPersons.sellerperson');
});


Route::get('/new-client', [App\Http\Controllers\HomeController::class, 'newClient'])->name('new.client');
Route::get('/upgrade-package', [App\Http\Controllers\HomeController::class, 'upgradePackage'])->name('upgrade.package');
Route::get('/total', [App\Http\Controllers\HomeController::class, 'total'])->name('total');

Route::get('/debug', [App\Http\Controllers\HomeController::class, 'debug'])->name('debug');
