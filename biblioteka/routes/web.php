<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpinionsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
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

Route::group([
    'middleware' => 'roles',
    'roles' => ['Admin']
], function(){
    Route::get('/home/adminBooked',[AdminController::class,'adminBooked'])->name('adminBooked');
    Route::get('/home/adminBorrowed',[AdminController::class,'adminBorrowed'])->name('adminBorrowed');
    Route::get('/home/adminHistory',[AdminController::class,'adminHistory'])->name('adminHistory');
    Route::get('/home/adminPanel/borrow/{id}',[EventsController::class,'borrow'])->name('borrow');
    Route::get('/home/adminPanel/return/{id}',[EventsController::class,'return'])->name('return');
});


Route::get('/catalog',[PagesController::class,'catalog'])->name('catalog');
Route::get('/opinions/{id}',[OpinionsController::class,'index'])->name('opinions');
Route::get('/create/{id}',[OpinionsController::class,'create'])->name('create');
Route::post('/create/{id}',[OpinionsController::class,'store'])->name('store');
Route::get('/delete/{id}',[OpinionsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [OpinionsController::class,'edit'])->name('edit');
Route::put('{id}', [OpinionsController::class,'update'])->name('update');

Route::get('/search', [PagesController::class,'search'])->name('search');
Route::get('/book/{id}',[EventsController::class,'book'])->name('book');
Route::put('/cancel/{id}',[EventsController::class,'cancel'])->name('cancel');

Route::get('/home',[UsersController::class,'showProfile'])->name('home');
Route::get('/home/booked',[EventsController::class,'showBooked'])->name('booked');
Route::get('/home/borrowed',[EventsController::class,'showBorrowed'])->name('borrowed');
Route::get('/home/history',[EventsController::class,'showHistory'])->name('history');

Auth::routes();
