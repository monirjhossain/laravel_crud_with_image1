<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[StudentController::class, 'index']);
Route::get('/create',[StudentController::class, 'create']);
Route::post('save-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::get('delete-student/{id}', [StudentController::class, 'destroy']);



