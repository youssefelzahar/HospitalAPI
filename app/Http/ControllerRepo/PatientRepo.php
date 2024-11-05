<?php
namespace App\Http\ControllerRepo;

use App\Models\Patients;
use App\BaseRepo\BaseRepo;
use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\Departments;
class PatientRepo extends BaseRepo
{
    public function __construct(Patients $model)
    {
        parent::__construct(model: $model);
    }
    public function getPatientsWithAppointments(){
       return Patients::join('appointments', 'patients.id', '=', 'appointments.patientid')
        ->join('doctors', 'appointments.doctorid', '=', 'doctors.id')
        ->join('departments', 'appointments.departmentid', '=', 'departments.id')
        ->select(
            'patients.name AS patient_name',
            'doctors.name AS doctor_name',
            'appointments.status AS status',
            'departments.name AS department'

        )
        ->get();
    }
    public function getPatientanddosage(){
        return Patients::join('treatments', 'patients.id', '=', 'treatments.patient_id')->
        select(
            'patients.name AS patient_name',
            'treatments.dosage AS dosage',
            'treatments_description AS treatments_description',
        )
        ->get();
    }

   
}