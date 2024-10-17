<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/home',[TournamentController::class,'homePage']);
    Route::get('/tournaments',[TournamentController::class,'allTournaments'])->name('tournaments');
    Route::get('/tournament-details/{id}',[TournamentController::class,'showDetails']);
    Route::get('/payment/{id}',[TournamentController::class,'confirmPayment'])->name('confirmPayment');
    Route::get('/payment-not-done/{id}',[TournamentController::class,'notDone']);
    Route::POST('/payment-done/{id}',[TournamentController::class,'paymentDone']);
    Route::get('/my-tournaments/{id}',[TournamentController::class,'myTournaments'])->name('myTournaments');
    Route::get('/details/{id}',[TournamentController::class,'details']);
});


//login and registration
Route::get('/first-page',[AuthController::class,'index']);
Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::POST('/register-control',[AuthController::class,'registerControl']);
Route::POST('/login-control',[AuthController::class,'loginControl']);
Route::POST('/logout',[AuthController::class,'logout']);