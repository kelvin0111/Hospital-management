<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientPageController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\AppointmentController;

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


Route::get('/dashboard', [PatientPageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Patient/addAppointment', [PatientPageController::class, 'addAppointment'])->name('Patient-add-Appointment');
    Route::get('/Patient/appointment', [PatientPageController::class, 'appointment'])->name('Patient-appointment');
    Route::get('/Patient/invoiceView', [PatientPageController::class, 'invoiceView'])->name('Patient-invoiceView');
    Route::get('/Patient/invoices', [PatientPageController::class, 'invoices'])->name('Patient-invoices');
    Route::get('/Patient/Reports', [PatientPageController::class, 'Reports'])->name('Patient-Reports');
    Route::get('/Patient/appoitmantTimeView', [PatientPageController::class, 'appoitmantTimeView'])->name('Patient-appoitmantTimeView');
    Route::get('/Patient/acceptPayment', [PatientPageController::class, 'acceptPayment'])->name('Patient-acceptPayment');
    Route::get('/Patient/Reschedule', [PatientPageController::class, 'Reschedule'])->name('Patient-Reschedule');
    Route::get('/Patient/updateSchedule', [AppointmentController::class, 'updateSchedule'])->name('Patient-updateSchedule');
    Route::get('/Patient/cancelAppointment', [AppointmentController::class, 'cancelAppointment'])->name('Patient-cancelAppointment');

    Route::get('/payment/success', [PaystackController::class, 'success'])->name('payment.success');
    Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
    Route::get('success', [PaystackController::class, 'success'])->name('success');
    Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/doctor.php';
