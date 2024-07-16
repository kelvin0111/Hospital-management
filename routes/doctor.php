<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctorview;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientPageController;
use App\Http\Controllers\AppointmentController;


Route::get('/doc/reg', [Doctorview::class, 'registration'])->name('doctor_reg');

Route::get('/doc/login', [Doctorview::class, 'login'])->name('doctor_login');

Route::get('/doc/dashboard', [Doctorview::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('doc_dashboard');

// Time 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/doctor/addAppointment', [Doctorview::class, 'addAppointment'])->name('doctor-add-Appointment');
    Route::get('/doctor/appointment', [Doctorview::class, 'appointment'])->name('doctor-appointment');
    Route::get('/doctor/invoiceView', [Doctorview::class, 'invoiceView'])->name('doctor-invoiceView');
    Route::get('/doctor/invoices', [Doctorview::class, 'invoices'])->name('doctor-invoices');
    Route::get('/doctor/Reports', [Doctorview::class, 'Reports'])->name('doctor-Reports');
    Route::get('/doctor/appoitmantTimeView', [Doctorview::class, 'appoitmantTimeView'])->name('doctor-appoitmantTimeView');
    Route::get('/doctor/acceptPayment', [Doctorview::class, 'acceptPayment'])->name('doctor-acceptPayment');
    Route::get('/doctor/Reschedule', [Doctorview::class, 'Reschedule'])->name('doctor-Reschedule');
    Route::get('/doctor/Time', [Doctorview::class, 'Time'])->name('doctor-Time');
    Route::post('/update-doctor-availability', [Doctorview::class, 'availability'])->name('doctor-availability');
    Route::get('/update-doctor-editTime', [Doctorview::class, 'editTime'])->name('doctor-editTime');
    Route::patch('/update-doctor-updateTime', [Doctorview::class, 'updateTime'])->name('doctor-updateTime');



    Route::get('/doctor/updateSchedule', [AppointmentController::class, 'updateSchedule'])->name('doctor-updateSchedule');
    Route::get('/doctor/cancelAppointment', [AppointmentController::class, 'cancelAppointment'])->name('doctor-cancelAppointment');
});
