<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AppointmentsController;

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

});


