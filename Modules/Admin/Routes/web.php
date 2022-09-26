<?php
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\ImageController;
use Modules\Admin\Http\Controllers\PhotographerController;

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

Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/logout', 'AdminController@logout')->name('admin.logout');
Route::post('/admin/login', 'AdminController@loginSubmit')->name('admin.login.submit');
Route::as('admin.')->prefix('admin')->middleware(['is_admin'])->group(function() {

    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::post('/change/password', 'AdminController@changePassword')->name('change.password');
    Route::post('/profile', 'AdminController@profileSubmit')->name('profile.submit');
    Route::get('/change/layout', 'AdminController@changeLayout')->name('layout.change');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/images', ImageController::class);

    Route::get('/photographers/images/status/{id}', [PhotographerController::class,'photographerImagesStatus'])->name('photographer.images.status');
    Route::get('/photographers/images/{type?}', [PhotographerController::class,'photographerImages'])->name('photographer.images');
    Route::get('/photographers/status/{id}', [PhotographerController::class,'toggleStatus'])->name('photographer.toggle.status');
    Route::resource('/photographers', PhotographerController::class);
});
