<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//all listings
Route::get('/', [ListingsController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingsController::class, 'create'])->middleware('auth');

//store listings data
Route::post('/listings', [ListingsController::class, 'store']);

//show edit form
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit']);

//update listing
Route::put('/listings/{listing}', [ListingsController::class, 'update']);

//delete listing
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy'])->name('delete');

//manage listings
Route::get('/listings/manage', [ListingsController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}', [ListingsController::class, 'show']);

//show register/create form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UsersController::class, 'store']);

//log out user
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth');

//show log in user form
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UsersController::class, 'authenticate']);

