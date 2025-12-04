<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [MainController::class, 'landingPage'])->name('landingPage');;
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::post('/storeLogin', [MainController::class, 'storeLogin'])->name('storeLogin');
    Route::post('/storePesan', [MainController::class, 'storePesan'])->name('storePesan');
});

// Logout untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/send/{slug}', [MainController::class, 'sendUndangan'])->name('sendUndangan');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
});


Route::middleware('role:admin')->group(function () {
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/message', [MainController::class, 'message'])->name('message');
    Route::get('/edit-content', [MainController::class, 'content'])->name('content');
    Route::post('/contactStore', [MainController::class, 'contactStore'])->name('contactStore');
    Route::post('/editMessage', [MainController::class, 'editMessage'])->name('editMessage');

    Route::get('/delTamu/{id}', [MainController::class, 'delTamu'])->name('delTamu');
    Route::get('/delMessage/{id}', [MainController::class, 'delMessage'])->name('delMessage');
});
