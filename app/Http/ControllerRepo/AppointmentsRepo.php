<?php

namespace App\Http\ControllerRepo;

use App\Models\Appointments;
use App\BaseRepo\BaseRepo;

class AppointmentsRepo extends BaseRepo
{
    public function __construct(Appointments $model)
    {
        parent::__construct($model);
    }
    public function getAppointmentswithpatientname($type_of_appointment){
          return Appointments::join('patients', 'patients.id', '=', 'appointments.patientid')
          ->where('status',"=" ,$type_of_appointment)
          ->select('patients.name AS PatientName','appointments.status')->get();
          
        
    }
}