<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'welcome'])->name('welcome');
Route::post('/add-employee', [EmployeeController::class, 'addEmployee'])->name('add.employee');
Route::post('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
