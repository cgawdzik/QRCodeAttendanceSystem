<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController; // Ensure you import the controller

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Define API routes for entry and exit, note that they're prefixed with 'api/'
Route::post('/entry', [AttendanceController::class, 'entry'])->middleware('auth:sanctum');
Route::post('/exit', [AttendanceController::class, 'exit'])->middleware('auth:sanctum');

// The existing sanctum route to return the authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
