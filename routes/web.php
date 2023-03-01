<?php

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingsController;

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
    return view('listings.listings', [
        'listings' => Listings::orderBy('id', 'desc')->paginate(5)
    ]);
});

Route::get('/register', function(){
    return view('register');
})->middleware('guest');

Route::post('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/login', function(){
    return view('login');
})->middleware('guest');

Route::post('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/manage', [ListingsController::class, 'manage'])->middleware('auth')->name('manage');

Route::get('/post', [ListingsController::class, 'post'])->middleware('auth');

Route::post('/post/create', [ListingsController::class, 'create'])->middleware('auth');

Route::get('/listings/edit/{id}', [ListingsController::class, 'show'])->middleware('auth');

Route::post('listings/update/{id}', [ListingsController::class, 'update']);

Route::post('listings/delete/{id}', [ListingsController::class, 'del']);

Route::get('/listings/details/{id}', function(Request $req){
    return view('listings.details', [
        'listing' => Listings::find($req->id)
    ]);
});

Route::get('/listings/{data}', [ListingsController::class, 'filterTags']);

Route::get('search', [ListingsController::class, 'search']);
