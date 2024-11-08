<?php
namespace App\Http\ControllerRepo;

use App\Models\Doctors; 
use App\BaseRepo\BaseRepo;
use Illuminate\Support\Facades\DB;

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

    public function Doctoswithnoofpatients(){
        return Doctors::join('appointments', 'doctors.id', '=', 'appointments.doctorid')
        ->select(
            'doctors.name AS doctor_name',
            'doctors.id AS ID',
            DB::raw('COUNT(DISTINCT appointments.patientid) as no_of_patients')
        )     
            ->groupBy('doctors.id', 'doctors.name')

        ->get();
    }

    public function getDoctorAppointmentStatusCounts()
    {
        $results = DB::table('doctors')
            ->join('appointments', 'doctors.id', '=', 'appointments.doctorid')
            ->select(
                'doctors.name',
                'doctors.id',
                DB::raw("COUNT(CASE WHEN appointments.status = 'pending' THEN 1 END) as Scheduled"),
                DB::raw("COUNT(CASE WHEN appointments.status = 'confirmed' THEN 1 END) as Completed"),
                DB::raw("COUNT(CASE WHEN appointments.status = 'canceled' THEN 1 END) as Canceled")
            )
            ->groupBy('doctors.id', 'doctors.name')
            ->get();
    
        return $results;
    }
}