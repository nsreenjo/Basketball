<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityStudentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('sayHello', function (Request $request) {
    return response(
        [
            'hello world' => 'hello world'
        ]
    );
});
Route::apiResource('users', UserController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('coaches', CoachController::class);
Route::apiResource('activities', ActivityController::class);
Route::apiResource('activityStudents', ActivityStudentController::class);
Route::apiResource('sessions', SessionController::class);




