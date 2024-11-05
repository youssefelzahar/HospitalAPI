<?php

namespace App\Http\Controllers;
use App\ResponseTrait;

use App\Models\Patients;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Http\ControllerRepo\PatientRepo;
class PatientsController extends Controller
{
     use ResponseTrait;
     protected $repo;


    public function __construct(PatientRepo $repo)
    {
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
    public function store(StorePatientsRequest $request)
    {
        //
        try{
            $patients=$this->repo->store($request->validated());
            return $this->success(
                data: $patients,
                message: 'Patient created successfully',
            );

        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage()
        );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patients $patients)
    {
        //
        try {
            // Update the patient record with validated data
            $updatepatients = $this->repo->update($patients->id, $request->validated());
            
            // Return a success response if the update is successful
            return $this->success(
                data: $updatepatients,
                message: 'Patient updated successfully'
            );
        } catch (\Exception $e) {
            // Return a failure response if there's an exception
            return $this->failure(
                message: "Error updating patient",
                error: $e->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        try{
            $patients=$this->repo->destroy($patients->id);
            return $this->success(
                data: $patients,
                message: 'Patient deleted successfully',
            );

        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage()
        );
        }
    }
    public function getPatientsWithAppointments(){
        $data= $this->repo->getPatientsWithAppointments();
        return $this->success($data);

    }
    public function getPatientanddosage(){
        $data= $this->repo->getPatientanddosage();
        return $this->success($data);

    }
}
