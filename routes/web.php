<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
//Users
Route::middleware(['auth'])->group(function() {
    //user homepage
    Route::get('/home',[TournamentController::class,'homePage']);
    //shows all the tournames that are currently hosted
    Route::get('/tournaments',[TournamentController::class,'allTournaments'])->name('tournaments');
    //show details of a single tournament
    Route::get('/tournament-details/{id}',[TournamentController::class,'showDetails']);
    //if i want ot join the tournament it takes tournament parameter and takes me to confirm payment page
    Route::get('/payment/{id}',[TournamentController::class,'confirmPayment'])->name('confirmPayment');
    //if payment is not confirmed, redirects me to prev page
    Route::get('/payment-not-done/{id}',[TournamentController::class,'notDone']);
    //payment done and takes me to my tournaments
    Route::POST('/payment-done/{id}',[TournamentController::class,'paymentDone']);
    //shows all the tournaments i joined
    Route::get('/my-tournaments/{id}',[TournamentController::class,'myTournaments'])->name('myTournaments');
    //shows tournament brackets and the player vs player option
    Route::get('/details/{id}',[TournamentController::class,'details']);
    //takes me to admin page
});
//admins

Route::middleware(['auth'])->group(function(){
    Route::get('/admin-home',[AuthController::class,'adminHome'])->name('adminHome');
    //show the add tournament page
    Route::get('/admin/add-tournament',[AdminController::class,'add']);
    //store the items from the form
    Route::POST('/admin/add-tournament-form',[AdminController::class,'storeValues']);
    //takes me to the search page
    Route::get('/admin/manage-tournament-search',[AdminController::class,'search']);
    //takes me to the manage tournament page where=> [tournament name - manage-edit-delete]
    Route::get('/admin/manage',[AuthController::class,'manage']);
    //takes to the versus control
    Route::get('/admin/manage-versus/{id}',[AdminController::class,'manageVersus']);

});

//login and registration
Route::get('/first-page',[AuthController::class,'index']);
Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::POST('/register-control',[AuthController::class,'registerControl']);
Route::POST('/login-control',[AuthController::class,'loginControl']);
Route::POST('/logout',[AuthController::class,'logout']);