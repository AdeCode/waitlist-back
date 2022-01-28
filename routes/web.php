<?php

use App\Http\Controllers\NewController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/show-waitlist', [NewController::class,'showWaitlist']);
Route::post('/submitWaitlist', [NewController::class,'addWaitlist'])->name('submitwaitlist');

//mail route
Route::get('/email', function(){
    Mail::to('codeadex@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

//vue routes
Route::get('/waitlists', [NewController::class,'viewWaitlist']);
