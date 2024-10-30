<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departments extends Model
{
    //

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'open_hours',
        'doctorid',
    ];

    public function doctor()
    {
        return $this->hasmany(Doctors::class);
    }
   
}
   

