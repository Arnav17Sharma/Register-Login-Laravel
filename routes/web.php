<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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

Route::get('/', [AuthManager::class, 'dashboard']) -> name('dashboard');

Route::get('/login', [AuthManager::class, 'login']) -> name('login');

Route::post('/login', [AuthManager::class, 'loginPost']) -> name('login.post');

Route::get('/register', [AuthManager::class, 'registration']) -> name('registration');

Route::post('/register', [AuthManager::class, 'registrationPost']) -> name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout']) -> name('logout');