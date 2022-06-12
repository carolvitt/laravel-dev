<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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
Route::get('/', function () {return view('home');});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/add', function () {return view('add');})->name('add');

Route::get('/search', [Controller::class, 'search'])->name('search');

Route::post('import', [Controller::class, 'import'])->name('import');

Route::get('/inscription', [Controller::class, 'showInscriptions'])->name('showInscriptions');

Route::post('search', [Controller::class, 'makeInscription'])->name('makeInscription');

Route::post('inscription', [Controller::class, 'removeInscription'])->name('removeInscription');



