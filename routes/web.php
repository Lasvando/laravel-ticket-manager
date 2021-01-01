<?php

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
        //GET
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/create', [App\Http\Controllers\CreateTicketsController::class, 'index'])->name('create-ticket-index');
        Route::get('/tickets', [App\Http\Controllers\TicketsController::class, 'index'])->name('tickets');
        Route::get('/tickets/detail/{id}', [App\Http\Controllers\TicketsController::class, 'show'])->name('tickets-detail');

        //API

        //POST
        Route::post('api/create-ticket', [App\Http\Controllers\CreateTicketsController::class, 'create'])->name('create-ticket-create');
        Route::get('api/delete/{id}', [App\Http\Controllers\TicketsController::class, 'delete'])->name('delete-ticket');
});


