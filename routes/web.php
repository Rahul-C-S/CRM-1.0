<?php

use App\Http\Controllers\common\Dashboard;
use App\Http\Controllers\features\Clients;
use App\Http\Controllers\user\Login;
use Illuminate\Support\Facades\Route;

//Routes withot authentication

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/do-login', [Login::class, 'doLogin'])->name('do.login');

//End routes withot authentication

//Routes requires authentication

Route::middleware('auth')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    //Clients

    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('', [Clients::class, 'index'])->name('list');

        Route::get('create', [Clients::class, 'create'])->name('create');
        Route::post('save', [Clients::class, 'save'])->name('save');

        Route::get('edit/{client_id}', [Clients::class, 'edit'])->name('edit');
        Route::post('update', [Clients::class, 'update'])->name('update');

        Route::get('delete/{client_id}', [Clients::class, 'delete'])->name('delete');

        Route::post('search', [Clients::class, 'search'])->name('search');
        Route::post('suggestion', [Clients::class, 'suggestion'])->name('suggestion');

        


    });

    //End clients

});

//End routes requires authentication
