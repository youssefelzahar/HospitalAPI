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
}