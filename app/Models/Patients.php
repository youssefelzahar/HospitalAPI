<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patients extends Model
{
    use HasFactory;

    //
    protected $fillable = ['name', 'phone','address','gender','age','date_of_birth'];

    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }

    public function treatments(){

        return $this->hasMany(Treatments::class);
    }


}
