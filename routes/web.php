<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentPositionController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\CreditTypeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('credit', CreditController::class);
    Route::resource('credit-type', CreditTypeController::class);
    Route::resource('agent-position', AgentPositionController::class);
    Route::resource('agent', AgentController::class);
});
