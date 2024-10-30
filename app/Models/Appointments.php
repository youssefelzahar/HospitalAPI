<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointments extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'doctorid',
        'patientid',
        'departmentid',
        'date_of_appointment',
        'status',
        'name of doctor',
    ];

    public function doctor(){
        return $this->belongsTo(Doctors::class);
    }
    public function patient(){
        return $this->belongsTo(Patients::class);
    }
}
