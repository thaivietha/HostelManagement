<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

// Route::get('/quantri', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('quantri');
Route::get('/quantri', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

// Route::get('load', [App\Http\Controllers\CustomerController2::class,'load' ])->name('load');
Route::resource('/quantri/quanlykhach' , 'App\Http\Controllers\CustomerController2')->middleware(['auth']);

Route::resource('/quantri/quanlyphong' , 'App\Http\Controllers\RoomController')->middleware(['auth'])->middleware(['cors']);
Route::get('viewmember/{id}', [App\Http\Controllers\RoomController::class,'viewmember'])->name('viewmember');
Route::resource('/quantri/hoadon' , 'App\Http\Controllers\BillController')->middleware(['auth']);
Route::get('billdetail/{id}', [App\Http\Controllers\BillController::class,'detail'])->name('billdetail');
Route::post('paid', [App\Http\Controllers\BillController::class,'paid'])->name('paid');
Route::resource('/quantri/dichvu' , 'App\Http\Controllers\ServiceController')->middleware(['auth']);
Route::resource('/search' , 'App\Http\Controllers\SearchController');

Route::get('/profile', function(){
    return view('profile');
})->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



