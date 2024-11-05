<?php
namespace App\Http\ControllerRepo;

use App\Models\Doctors; 
use App\BaseRepo\BaseRepo;

class DoctorsRepo extends BaseRepo{

    public function __construct(Doctors $model){
        parent::__construct(model: $model);
    }
    public function getDoctorwithDepartmentandAppointment(){
        return Doctors::join('departments', 'doctors.id', '=', 'departments.id')
        ->leftJoin('appointments', 'doctors.id', '=', 'appointments.doctorid')
        ->where('departments.name', 'Orthopedics')
        ->select(
            'doctors.name AS doctor_name',
            'departments.name AS department_name',
            'appointments.date_of_appointment AS AppointmentsDate',
            'doctors.department AS department',
        ) 
        ->get();
    }
}