<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatments extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'prescribed_treatment',
        'treatments_description',
        'dosage',
        'patient_id',
        'doctor_id',
        'medication_id',
    ];

    public function patient(){
        return $this->belongsTo(Patients::class, 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }

    public function medication(){
        return $this->belongsToMany(Medications::class, 'medication_id');
    }


}
