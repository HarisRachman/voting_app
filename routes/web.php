<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventController;

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
    return view('welcome');
});


Route::get('/votes', [CandidateController::class, 'indexFront'])->name('candidates.index');
Route::post('/add-vote', [VoteController::class, 'store'])->name('vote.store');
Route::post('/notification', [VoteController::class, 'notificationCallback'])->name('notification');

Route::view('Payment','payment')->name('paymentView');

Auth::routes();

Route::resource('organizer', OrganizerController::class);
Route::resource('event', EventController::class);
Route::resource('candidate', CandidateController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
