<?php
namespace App\Http\ControllerRepo;

use App\Models\Departments;
use App\BaseRepo\BaseRepo;

class DepartmentsRepo extends BaseRepo{

    public function __construct(Departments $department){
        parent::__construct($department);
    }
}