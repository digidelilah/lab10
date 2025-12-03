<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('home');
});
//page1 route
Route::get("page1",function(){
    $user = auth()->user()?->name;
    return view("page1", ["user" => $user]);
});
//registar get
Route::get('/register', function () {
    return view('register');
});

//user auth routes
Route::post('/register', [UserController::class, "register"]);
Route::post("/logout",[UserController::class, "logout"]);
Route::post("/login",[UserController::class, "login"]);



