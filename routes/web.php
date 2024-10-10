<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FoundAndLost;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\PassoutController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SecurityAdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentEventController;
use App\Http\Controllers\StudentProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Registration Routes
Route::get('/registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registration', [RegisterController::class, 'register']);

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Password Reset Routes
Route::get('/resetPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/resetPassword', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgotPassword.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

// Protected Routes (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/updates', [StudentController::class, 'updates'])->name('student.updates');
    Route::get('/student/map', [PassoutController::class, 'map'])->name('student.map');

    // Lecturer Routes
    Route::get('/student/lecturers', [LecturerController::class, 'index'])->name('student.lecturers');
    Route::get('/lecturer/Availability', [LecturerController::class, 'availability'])->name('lecturer.availability');
    Route::post('/lecturer/update-status', [LecturerController::class, 'updateAvailability'])->name('lecturer.updateAvailability');
    Route::post('/lecturer/toggle-availability', [StudentProfileController::class, 'toggleAvailability'])->name('lecturer.toggleAvailability');

    // Lab Routes
    Route::get('/student/labs', [LabController::class, 'index'])->name('all.labs');
    Route::post('/labs/book', [LabController::class, 'bookSlot'])->name('book.slot');
    Route::delete('/labs/unbook/{id}', [LabController::class, 'unbookSlot'])->name('labs.unbook');

    // Found and Lost Items
    Route::get('/lostItems', [FoundAndLost::class, 'index'])->name('lostItems');
    Route::post('/lostItems', [FoundAndLost::class, 'store'])->name('lostItems.store');
    Route::delete('/lost-items/{id}', [FoundAndLost::class, 'destroy'])->name('lostItems.destroy');

    // PDF Downloads
    Route::get('/devices/download-pdf/{id}', [PdfController::class, 'downloadPdf'])->name('devices.downloadPdf');

    // Profile Routes
    Route::get('/student/profile/StudentProfile', [StudentProfileController::class, 'profile'])->name('student.profile.StudentProfile');
    Route::put('/profile', [StudentProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [StudentProfileController::class, 'logout'])->name('logout');

    // Passout Routes
    Route::get('/student/passOur', [PassoutController::class, 'index'])->name('student.passOur');
    Route::post('/devices/store', [DeviceController::class, 'store'])->name('devices.store');
    Route::put('/devices/{id}', [PassoutController::class, 'update'])->name('devices.update');
    Route::post('/devices/{id}/report', [PassoutController::class, 'report'])->name('devices.report');
    Route::delete('devices/{device}', [PassoutController::class, 'destroy'])->name('devices.delete');

    //event
    // Route for student event calendar
    Route::get('/student/events', [StudentEventController::class, 'index'])->name('student.events');

// Route to fetch events data for the calendar
    Route::get('/events/data', [StudentEventController::class, 'fetchEvents'])->name('student.events.data');
});

// This allows access to the login page without authentication




//admin part
Route::get('/admin/layouts', function () {
    return view('admin.layouts.app');
});
Route::middleware('auth:admin')->group(function() {
    Route::get('/admin/security/dashboard', [SecurityAdminController::class, 'index'])->name('admin.security.dashboard');



    Route::post('/admin/logout', [SecurityAdminController::class, 'logout'])->name('admin.logout');

    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

//events
    Route::get('/admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::resource('events', EventController::class);
    Route::get('events-data', [EventController::class, 'getEvents'])->name('events.data');






    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::resource('articles', ArticleController::class);

    Route::get('/admin/news', [ArticleController::class, 'news'])->name('admin.news');


    Route::post('/devices/{id}/found', [SecurityAdminController::class, 'markAsFound'])->name('devices.found');
    Route::post('/devices/{id}/notify', [SecurityAdminController::class, 'notifyLocation'])->name('devices.notify');

    //lost and found
    Route::get('/lost-and-found', [SecurityAdminController::class, 'lostAndFound'])->name('lost.and.found');
    Route::post('/devices/notify-location/{id}', [SecurityAdminController::class, 'tifyLocation'])->name('devices.notifyLocation');

});



