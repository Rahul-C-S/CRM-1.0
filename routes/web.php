<?php

use App\Http\Controllers\common\Dashboard;
use App\Http\Controllers\user\Login;
use Illuminate\Support\Facades\Route;



Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/do-login', [Login::class, 'doLogin'])->name('do.login');


Route::middleware('auth')->group(function(){
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    
});


