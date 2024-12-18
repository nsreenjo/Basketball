<?php

use App\Http\Controllers\ActivityStudentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Livewire\Users;
use App\Http\Controllers\ActivityController;

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
Route::resource('users', UserController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login.index');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'login'])->name('login');


////////////////////////////////////// users //////////////////////////////////////////////////////


/////////////////////////////////////////  students  /////////////////////////////////////////////////

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::resource('/coaches', CoachController::class);
Route::post('/assignCoach', [UserController::class, 'assignCoach'])->name('users.assignCoach');
Route::post('/assignCoach', [UserController::class, 'assignCoach'])->name('users.assignCoach');

///////////////////////////////////////// activity ////////////////////////////////////////////////


Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

//////////////////////////////////////// profile //////////////

Route::get('/dashboard/profile', [ProfileController::class, 'dashboardProfile'])->name('dashboard.profile');
Route::get('profile', [ProfileController::class, 'viewProfile'])->name('view.profile');

Route::get('/specific-user', [ProfileController::class, 'showSpecificUser'])->name('user.specific');

///////////////////////////////////////// Session ////////////////////////////////////////////////
Route::resource('session' , SessionController::class);
///////////////////////////////////////// Activity Student ////////////////////////////////////////////////
Route::get('/activity_students/create/{activity_id}', [ActivityStudentController::class, 'create'])->name('activity_students.create');
Route::resource('activity_students', ActivityStudentController::class)->except(['create']);
















Route::get('/home', [\App\Http\Controllers\Api\HomeController::class, 'index'])->name('home');

