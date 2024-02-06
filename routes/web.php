<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\QueController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
});


Route::view('/signup', "signup")->name('signup');
Route::view('/login', "login")->name('login')->middleware("guest");
Route::view('/home', "home")->name('home')->middleware("auth");
Route::get("/@{mentionName}", [UserController::class, "index"]);
Route::get("/topic", [TopicController::class, "index"]);
Route::get("/topic/{idTopic}", [TopicController::class, "indexForTopic"]);
Route::get("/feed", [FeedController::class, "index"]);
Route::get("/feed/{idTag}", [FeedController::class, "indexForTag"]);


Route::post("/User/Create", [SignupController::class, "create"]);
Route::post("/User/Login", [LoginController::class, "login"]);


Route::get("/{idFeed}", [QueController::class, "index"]);