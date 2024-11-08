<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorsRequest;
use App\Http\Requests\UpdateDoctorsRequest;
use App\ResponseTrait;
use App\Http\ControllerRepo\DoctorsRepo;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ResponseTrait;
    protected $repo;

    public function __construct(DoctorsRepo $repo){
        $this->repo = $repo;
    }
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
    public function store(StoreDoctorsRequest $request)
    {
        //
        try{
            $doctors=$this->repo->store($request->validated());
            return $this->success(
                data: $doctors,
                message: 'Doctor created successfully',
            );
        }
        catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctors $doctors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorsRequest $request, Doctors $doctors)
    {
        //
        try{
            $updatedoctors=$this->repo->update($doctors->id,$request->validated());
            return $this->success(
                data: $updatedoctors,
                message: 'Doctor updated successfully',
            );
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctors $doctors)
    {
        try{
            $this->repo->destroy($doctors->id);
           return $this->success(message:"success to delete data");
        }catch(\Exception $e){
            return$this->failure(message:"failed to delete data",error:$e->getMessage());
        }
    }

    public function getDoctorwithDepartmentandAppointment(){
        $data= $this->repo->getDoctorwithDepartmentandAppointment();
        return $this->success($data);
    }
    public function Doctoswithnoofpatients(){
        $data= $this->repo->Doctoswithnoofpatients();
        return $this->success($data);
    }

    public function getDoctorAppointmentStatusCounts(){
        $data= $this->repo->getDoctorAppointmentStatusCounts();
        return $this->success($data);
    }
}
