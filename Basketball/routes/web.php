<?php
use App\Http\Controllers\StudentController;

use App\Http\Controllers\UserController;
use App\Http\Livewire\Users;

use Illuminate\Support\Facades\Route;

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


Auth::routes();
//mustafa
Route::resource('/users', UserController::class);



////////////////////////////////////// users //////////////////////////////////////////////////////
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); 
Route::post('/users', [UserController::class, 'store'])->name('users.store'); 
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); 
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); 
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); 

/////////////////////////////////////////  students  /////////////////////////////////////////////////

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create'); 
Route::post('/students', [StudentController::class, 'store'])->name('students.store'); 
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update'); 
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy'); 
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');



















Route::get('/home', [\App\Http\Controllers\Api\HomeController::class, 'index'])->name('home');

