<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Page\PageController;

Route::get('/', function () {
    return view('welcome');
});




Route::get("/login", [Login::class, 'login'])->name("login");
Route::post("/authenticate", [Login::class, 'authenticate'])->name("authenticate");
Route::get("/register", [Register::class, 'register'])->name("register");
Route::post("/store", [Register::class, 'store'])->name("store");
Route::post('/logout', [Logout::class, 'logout'])->name('logout');






Route::get("/index", [PageController::class, 'index'])->name("index");