<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController; // Ensure you import the controller

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

// Change the route for entry from get to post and use the array syntax for the controller
Route::post('/entry', [AttendanceController::class, 'entry'])->name('entry');

// Keep the post route for exit as it is, just use the array syntax for the controller
Route::post('/exit', [AttendanceController::class, 'exit'])->name('exit');

// The default welcome route
Route::get('/', function () {
    return view('welcome');
});
