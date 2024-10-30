<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Billing extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'cost',
        'type',
        'dateofpayment',
       
    ];
    public function Patients(){
        return $this->has(Patients::class);
    }
}
