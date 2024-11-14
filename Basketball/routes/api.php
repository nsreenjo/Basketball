<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::put('users/{user}', [UserController::class, 'update']); // For PUT request

