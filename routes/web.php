<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ATMController;


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

Route::get('/atm', [PageController::class, 'atm'])->name('atm');
Route::post('/atm-withdraw', [ATMController::class, 'withdraw'])->name('atm_withdraw');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/sample_form', [PageController::class, 'sample_form'])->name('sample_form');
Route::post('/sample_form_submit', [PageController::class, 'sample_form_submit']);