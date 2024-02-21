<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ProductController;


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
    return view('welcome', [
        'titleBar' => 'Welcome'
    ]);
})->middleware(['verify.shopify'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::resource('products', ProductController::class);

Route::get('/settings', function () {
    return view('settings', [
        'titleBar' => 'Settings'
    ]);
});
