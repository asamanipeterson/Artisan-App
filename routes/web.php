<?php

use App\Http\Controllers\ServiceContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\availservices;
use App\Http\Controllers\AuthController;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('services', ServiceContoller::class, [
    'except' => ['edit', 'update', 'destroy']
])->middleware('auth');

Route::resource('services', ServiceContoller::class, [
    'only' => ['edit', 'update', 'destroy']
])->middleware(['auth', 'owner']);

// Route::get('/availableservices', [availservices::class, 'index']);
// Route::get('/dashboard', [ServiceContoller::class, 'index']);


//THIS HELPS US TO PREVIEW THE MAIL IN THE BROWSER FOR TESTING PURPOSES
// Route::get('/mail', function () {
//     $user = User::find(7);
//     $mail = new Welcome($user);
//     return $mail;
// });

Route::get('/mail', function () {
    $user = Auth::user();
    $mail = new Welcome($user);
    return $mail;
})->middleware('auth');




//login system

Route::prefix('auth')->controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('login', 'loginPage')->name('login.page')->middleware('guest'); //This brings the login page
    Route::post('login', 'login')->name('login')->middleware('guest'); //This submit the form  for authentication

    Route::get('register', 'registerPage')->name('register.page')->middleware('guest'); //This brings the register page
    Route::post('register', 'register')->name('register')->middleware('guest'); // This submit the form  for authentication

    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});
