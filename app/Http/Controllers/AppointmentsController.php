<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentsRequest;
use App\Http\Requests\UpdateAppointmentsRequest;
use App\ResponseTrait;
use App\BaseRepo\BaseRepo;
use App\Http\ControllerRepo\AppointmentsRepo;
use Illuminate\Http\Request;
class AppointmentsController extends Controller
{
    use ResponseTrait;
    protected $repo;
    public function __construct(AppointmentsRepo $repo){
        $this->repo = $repo;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= $this->repo->index();
        return $this->success($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentsRequest $request)
    {
        try{
            $appointments=$this->repo->store($request->validated());
            return $this->success(data:$appointments,message:"Appointment created successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentsRequest $request, Appointments $appointments)
    {
        try{
            $appointments=$this->repo->update($appointments->id,$request->validated());
            return $this->success(data:$appointments,message:"Appointment updated successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointments)
    {
        try{
            $this->repo->destroy($appointments->id);
            return $this->success(message:"Appointment deleted successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }
    public function  getAppointmentswithpatientname(Request $request){
        $request->validate([
            'type_of_appointment' => 'required|string',
        ]);

   return $this->success($this->repo->getAppointmentswithpatientname($request->type_of_appointment));
   
}
}