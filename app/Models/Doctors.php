<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctors extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'name',
        'gender',
        'department',
        'phone',
        'work_hours',
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function Appointments(){

        return $this->hasMany(Appointments::class);
    }

    public function treatments(){

        return $this->hasMany(Treatments::class);
    }

}
