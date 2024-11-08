<?php

namespace App\Http\ControllerRepo;

use App\Models\Treatments;
use App\BaseRepo\BaseRepo;
class TreatmentsRepo extends BaseRepo{

    public function __construct(Treatments $model){
        parent::__construct($model);
    }
}