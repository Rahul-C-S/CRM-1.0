<?php

use App\Http\Controllers\common\Dashboard;
use App\Http\Controllers\features\Clients;
use App\Http\Controllers\features\Issues;
use App\Http\Controllers\user\Login;
use App\Http\Controllers\user\Users;
use Illuminate\Support\Facades\Route;

//Routes withot authentication

Route::get('/login', [Login::class, 'index'])->name('login');
Route::any('/do-login', [Login::class, 'doLogin'])->name('do.login');

//End routes withot authentication

//Routes requires authentication

Route::middleware('auth')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    //Clients

    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('', [Clients::class, 'index'])->name('list');

        Route::get('create', [Clients::class, 'create'])->name('create');
        Route::any('save', [Clients::class, 'save'])->name('save');

        Route::get('edit/{client_id}', [Clients::class, 'edit'])->name('edit');
        Route::any('update', [Clients::class, 'update'])->name('update');

        Route::get('delete/{client_id}', [Clients::class, 'delete'])->name('delete');

        Route::any('search', [Clients::class, 'search'])->name('search');
        Route::post('suggestion', [Clients::class, 'suggestion'])->name('suggestion');

        Route::get('export', [Clients::class, 'export'])->name('export');
        Route::get('export-pdf', [Clients::class, 'export_pdf'])->name('export-pdf');
    });

    //End clients

    //Issues
    Route::name('issues.')->prefix('issues')->group(function () {
        Route::get('', [Issues::class, 'index'])->name('list');

        Route::get('create', [Issues::class, 'create'])->name('create');
        Route::any('save', [Issues::class, 'save'])->name('save');

        Route::get('edit/{issue_id}', [Issues::class, 'edit'])->name('edit');
        Route::any('update', [Issues::class, 'update'])->name('update');

        Route::get('delete/{issue_id}', [Issues::class, 'delete'])->name('delete');

        Route::get('export', [Issues::class, 'export'])->name('export');
        Route::get('export-pdf', [Issues::class, 'export_pdf'])->name('export-pdf');

        Route::get('caller-id/{number}', [Issues::class, 'callerId'])->name('caller-id');
    });

    //End issues


    //Users
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [Users::class, 'index'])->name('list');
        Route::get('create', [Users::class, 'create'])->name('create');
        Route::any('save', [Users::class, 'save'])->name('save');

        Route::get('edit/{id}', [Users::class, 'edit'])->name('edit');
        Route::any('update', [Users::class, 'update'])->name('update');

        Route::get('delete/{id}', [Users::class, 'delete'])->name('delete');

       



    });


    //End Users

});

//End routes requires authentication
