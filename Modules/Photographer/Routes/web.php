<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Photographer\Http\Controllers\ProfileController;

//Auth::routes(['verify' => true]);
Route::as('photographer.')->prefix('photographer')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [ProfileController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class,'profileEdit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class,'profileEditSubmit'])->name('profile.edit.submit');
});
