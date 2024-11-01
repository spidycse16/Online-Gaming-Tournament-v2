<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CocController;
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
    //visit coc bases
    Route::get('/coc-bases',[CocController::class,'cocBase']);
    //likes count
    Route::put('/likes-control/{id}',[CocController::class,'likesControl']);
    //base deatils and download views increment
    Route::put('/base-details/{id}',[CocController::class,'baseDetails']);
});

//admins

Route::middleware(['auth'])->group(function(){
    //takes me to admin page
    Route::get('/admin-home',[AdminController::class,'adminHome'])->name('adminHome');
    //show the add tournament page
    Route::get('/admin/add-tournament',[AdminController::class,'add']);
    //store the items from the form
    Route::POST('/admin/add-tournament-form',[AdminController::class,'storeValues']);
    //takes me to the search page
    Route::get('/admin/manage-tournament-search',[AdminController::class,'search']);
    //takes me to the manage tournament page where=> [tournament name - manage-edit-delete]
    Route::get('/admin/manage',[AdminController::class,'manage']);
    //takes to the versus control
    Route::get('/admin/manage-versus/{id}',[AdminController::class,'manageVersus'])->name('manage');
    //delete user who lost the match
    Route::POST('/admin/eliminate-user/{id}/advance/{increase_id}/tournament/{tour_id}',[AdminController::class,'deleteUser']);
    //show the edit Tournament page
    Route::get('/admin/edit-tournament/{id}',[AdminController::class,'editTournament']);
    //control the edit tournament page
    Route::put('/admin/update-tournament/{id}',[AdminController::class,'update']);
    Route::delete('/admin/delete/{id}',[AdminController::class,'delete']);
    //manage coc base modules
    Route::get('/admin/manage-coc-bases',[CocController::class,'manage']);
    //add clash of clan base
    Route::get('/admin/add-coc-base',[CocController::class,'add'])->name('addBase');
    //control base store
    Route::POST('/admin/add-base-control',[CocController::class,'addControl']);


});

//login and registration
Route::get('/first-page',[AuthController::class,'index']);
Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::POST('/register-control',[AuthController::class,'registerControl']);
Route::POST('/login-control',[AuthController::class,'loginControl']);
Route::POST('/logout',[AuthController::class,'logout']);