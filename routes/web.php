<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\PassoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
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

Route::get('/student/lecturers', [LecturerController::class, 'index'])->name('student.lecturers');
Route::get('/lecturer/Availability', [LecturerController::class, 'availability'])->name('lecturer.availability');
Route::post('/lecturer/update-status', [LecturerController::class, 'updateAvailability'])->name('lecturer.updateAvailability');



Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
Route::get('/student/updates', [StudentController::class, 'updates'])->name('student.updates');


Route::get('/student/map', [PassoutController::class, 'map'])->name('student.map');

//passout
// routes/web.php
Route::get('/student/passOur', [PassoutController::class, 'index'])->name('student.passOur');
Route::post('/devices/store', [DeviceController::class, 'store'])->name('devices.store');


Route::put('/devices/{id}', [PassoutController::class, 'update'])->name('devices.update');


Route::post('/devices/{id}/report', [PassoutController::class, 'report'])->name('devices.report');
Route::delete('devices/{device}', [PassoutController::class, 'destroy'])->name('devices.delete');


//profile
Route::get('/student/profile/StudentProfile', [StudentProfileController::class, 'profile'])->name('student.profile.StudentProfile');
Route::put('/profile', [StudentProfileController::class, 'update'])->name('profile.update');
Route::post('/logout', [StudentProfileController::class, 'logout'])->name('logout');
Route::post('/lecturer/toggle-availability', [StudentProfileController::class, 'toggleAvailability'])
    ->name('lecturer.toggleAvailability')
    ->middleware('auth');  // Ensure the user is authenticated



