<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\PassoutController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login');
});








//registration


Route::get('/registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registration', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/resetPassword', [ForgotPasswordController::class, 'forgotPassword'])
    ->name('forgotPassword');

Route::post('/resetPassword', [ForgotPasswordController::class, 'forgotPasswordPost'])
    ->name('forgotPassword.post');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');


//Dashboard
Route::get('/lecturer/dashboard', [LecturerController::class, 'index'])->name('lecturer.dashboard');
Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

Route::get('/student/passOur', [PassoutController::class, 'index'])->name('student.passOur');
Route::get('/student/map', [PassoutController::class, 'map'])->name('student.map');

