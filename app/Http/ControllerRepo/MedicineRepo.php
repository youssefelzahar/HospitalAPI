<?php

namespace App\Http\ControllerRepo;

use App\Models\Medications;
use App\BaseRepo\BaseRepo;
class MedicineRepo extends BaseRepo
{
    public function __construct(Medications $model)
    {
        parent::__construct($model);
    }
    public function filterbyquantity($max_quantity){
        return Medications::select('id', 'name', 'expire_date', 'quantityavailable')
            ->where('quantityavailable', '<=', $max_quantity)
            ->orderBy('quantityavailable', 'desc')
            ->get();

    }

}