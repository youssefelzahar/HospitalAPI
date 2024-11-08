<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\BillingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(PatientsController::class)->group(function () {
    Route::get('/patients', 'index')->name('patients.index');
    Route::post('/patients', 'store');
    Route::put('/patients/{patients}', 'update');
    Route::delete('/patients/{patients}', 'destroy');
    Route::get('/getPatientsWithAppointments', 'getPatientsWithAppointments');
    Route::get('/getPatientanddosage', 'getPatientanddosage');

});
Route::controller(DoctorsController::class)->group(callback: function () {
    Route::get('/doctors', 'index')->name('doctors.index');
    Route::post('/doctors', 'store');
    Route::put('/doctors/{doctors}', 'update');
    Route::delete('/doctors/{doctors}', 'destroy');
    Route::get('/getDoctorwithDepartmentandAppointment', 'getDoctorwithDepartmentandAppointment');
    Route::get('/getDoctorwithnoofpatients', 'Doctoswithnoofpatients');
    Route::get('/getDoctorAppointmentStatusCounts', 'getDoctorAppointmentStatusCounts');

});

Route::controller(DepartmentsController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::post('/departments', 'store');
    Route::put('/departments/{departments}', 'update');
    Route::delete('/departments/{departments}', 'destroy');

});

Route::controller(AppointmentsController::class)->group(function () {
    Route::get('/appointments', 'index')->name('appointments.index');
    Route::post('/appointments', 'store');
    Route::put('/appointments/{appointments}', 'update');
    Route::delete('/appointments/{appointments}', 'destroy');
    Route::get('/appointments/filter-by-patient', 'getAppointmentswithpatientname');

});

Route::controller(MedicationsController::class)->group(callback: function () {
    Route::get('/medications', 'index')->name('medications.index');
    Route::post('/medications', 'store');
    Route::put('/medications/{medications}', 'update');
    Route::delete('/medications/{medications}', 'destroy');
    Route::get('/medications/filter-by-quantity', 'filterByQuantity');

});

Route::controller(TreatmentsController::class)->group(callback: function () {
    Route::get('/treatments', 'index')->name('treatments.index');
    Route::post('/treatments', 'store');
    Route::put('/treatments/{treatments}', 'update');
    Route::delete('/treatments/{treatments}', 'destroy');

});

Route::controller(BillingController::class)->group(callback: function () {
    Route::get('/billing', 'index')->name('billing.index');
    Route::post('/billing', 'store');
    Route::put('/billing/{billing}', 'update');
    Route::delete('/billing/{billing}', 'destroy');

});
