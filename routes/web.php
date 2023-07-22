<?php

use App\Http\Controllers\common\Dashboard;
use App\Http\Controllers\user\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/do-login', [Login::class, 'doLogin'])->name('do.login');




Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
