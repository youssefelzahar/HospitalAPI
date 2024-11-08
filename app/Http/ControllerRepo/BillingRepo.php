<?php

namespace App\Http\ControllerRepo;
use App\Models\Billing;
use App\BaseRepo\BaseRepo;

class BillingRepo extends BaseRepo{
    public function __construct(Billing $model){
        parent::__construct($model);

    }
}
