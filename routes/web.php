<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentPositionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\CreditTypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('credit/folder/document/{id}/download', [CreditController::class, 'downloadDocument'])->name('credit.document.download');
    Route::get('credit/folder/document/{id}/accept', [CreditController::class, 'acceptDocument'])->name('credit.document.accept');
    Route::get('credit/folder/document/{id}/destroy', [CreditController::class, 'destroyDocument'])->name('credit.document.destroy');
    Route::get('credit/{id}/folder', [CreditController::class, 'folder'])->name('credit.folder');
    Route::patch('credit/{id}/folder', [CreditController::class, 'addFiles'])->name('credit.folder.store');
    Route::patch('credit/{id}/accept', [CreditController::class, 'acceptCredit'])->name('credit.accept');
    Route::get('credit/{id}/archive', [CreditController::class, 'zipFolder'])->name('credit.archive');
    Route::resource('credit', CreditController::class);
    Route::resource('credit-type', CreditTypeController::class);
    Route::resource('agent-position', AgentPositionController::class);
    Route::resource('agent', AgentController::class);
    Route::resource('client', ClientController::class);
});
