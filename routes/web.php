<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Faker\Provider\Lorem;

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
    return view('frontend.welcome');
})->middleware('user.visit');;

Route::middleware('admin.guest')->group(function () {
    Route::get('/login', [StudentController::class, 'login'])->name('login');
    Route::get('/register', [StudentController::class, 'register']);
    Route::post('/adminregister', [StudentController::class, 'adminregister'])->name('adminregister');
    Route::post('/adminlogin', [StudentController::class, 'adminlogin'])->name('adminlogin');
});



Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/addcourse', [StudentController::class, 'addcourse'])->name('addcourse');
    Route::get('/addadmin', [StudentController::class, 'addadmin'])->name('addadmin');
    Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
    Route::post('/addcourselink', [StudentController::class, 'addcourselink'])->name('addcourselink');
    Route::post('/addadminlink', [StudentController::class, 'addadminlink'])->name('addadminlink');
    Route::post('/addstudentlink', [StudentController::class, 'addstudentlink'])->name('addstudentlink');
    Route::get('/viewcourses', [StudentController::class, 'viewcourses'])->name('viewcourses');
    Route::get('/viewadmins', [StudentController::class, 'viewadmins'])->name('viewadmins');
    Route::get('/viewstudents', [StudentController::class, 'viewstudents'])->name('viewstudents');
    Route::get('/viewstudents/{id}', [StudentController::class, 'viewstudentdetails'])->name('viewstudentdetails');
    Route::get('/viewadminprofile/{id}', [StudentController::class, 'viewadminprofile'])->name('viewadminprofile');
    Route::get('/courses/{id}/edit', [StudentController::class, 'editcourse'])->name('editcourse');
    Route::get('/admins/{id}/edit', [StudentController::class, 'editadmin'])->name('editadmin');
    Route::get('/students/{id}/edit', [StudentController::class, 'editstudent'])->name('editstudent');
    Route::get('/viewadminprofile/{id}/edit', [StudentController::class, 'editprofile'])->name('editprofile');
    Route::put('/courses/{id}', [StudentController::class, 'updatecourse'])->name('updatecourse');
    Route::put('/admins/{id}', [StudentController::class, 'updateadmin'])->name('updateadmin');
    Route::put('/students/{id}', [StudentController::class, 'updatestudent'])->name('updatestudent');
    Route::put('/profile/{id}', [StudentController::class, 'updateprofile'])->name('updateprofile');
    Route::delete('/courses/{id}', [StudentController::class, 'destroycourse'])->name('destroycourse');
    Route::delete('/admins/{id}', [StudentController::class, 'destroyadmin'])->name('destroyadmin');
    Route::delete('/students/{id}', [StudentController::class, 'destroystudent'])->name('destroystudent');
    Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
});

Route::get('/about', [StudentController::class, 'about'])->name('about');
Route::get('/contact', [StudentController::class, 'contact'])->name('contact');
Route::get('/faq', [StudentController::class, 'faq'])->name('faq');
Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
