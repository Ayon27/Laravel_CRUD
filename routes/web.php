<?php

use App\Http\Controllers\testController;
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

Route::get('/', [testController::class, 'testMethod'])->name('home');
Route::get('/create', [testController::class, 'create'])->name('create');
Route::post('/create', [testController::class, 'store'])->name('store');
Route::get('/edit/{id}', [testController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [testController::class, 'update'])->name('update');

//Route::view('/', 'welcome');

//Route::get('/', function () {
//    return view('mainTest');
//});
//
//Route::get('/test', function () {
//    return view('test');
//});
//
//
//Route::get('home/{id}', function ($id) {
//    return "your id is " . $id * 22;
//});
