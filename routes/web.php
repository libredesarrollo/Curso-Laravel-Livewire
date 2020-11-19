<?php

use App\Http\Livewire\UserSave;
use App\Http\Livewire\UsersList;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['namespace' => 'App\Http\Controllers\Dashboard'], function () {
        Route::resource('user', UserController::class);
        //Route::get('user', [UserController::class,'index']);
        /*Route::get('cuser', function () {
            return view('dashboard.users.cindex');
        });*/
        
    });
    Route::get('cuser', UsersList::class)->name('user.list');
    Route::get('create-user', UserSave::class)->name('user.create');
    Route::get('update-user/{id}', UserSave::class)->name('user.edit');
    
});


