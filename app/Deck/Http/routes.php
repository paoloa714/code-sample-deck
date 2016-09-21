<?php
use \Illuminate\Support\Facades\Route;
use App\Deck\Http\DeckController;

Route::post('/deck', DeckController::class . '@create');
Route::get('/deck/{id}', DeckController::class . '@get');
Route::post('/deck/{id}/draw', DeckController::class . '@draw');
Route::post('/deck/{id}/shuffle' , DeckController::class . '@shuffle');
Route::delete('/deck/{id}', DeckController::class . '@delete');
Route::get('/deck' , DeckController::class . '@index');