<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentsRequest;
use App\Http\Requests\UpdateDepartmentsRequest;
use App\ResponseTrait;
use App\Http\ControllerRepo\DepartmentsRepo;

class DepartmentsController extends Controller
{
    use ResponseTrait;
    protected $DepartmentsRepo;

    public function __construct(DepartmentsRepo $repo){
       $this->DepartmentsRepo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= $this->DepartmentsRepo->index();
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
    public function store(StoreDepartmentsRequest $request)
    {
        try{
            $departments=$this->DepartmentsRepo->store($request->validated());
            return $this->success(data:$departments,message:"Department created successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentsRequest $request, Departments $departments)
    {
        try {
            $updatedepartments = $this->DepartmentsRepo->update($departments->id, $request->validated());
            
            return $this->success(
                data: $updatedepartments,
                message: 'dEpartment updated successfully'
            );
        } catch (\Exception $e) {
            return $this->failure(
                message: "Error updating dEpartment",
                error: $e->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departments $departments)
    {
        try {
            $deleted = $this->DepartmentsRepo->destroy($departments->id);
    
            if ($deleted) {
                return $this->success(message: "success to delete data");
            } else {
                return $this->failure(message: "failed to delete data", error: "Record not found");
            }
        } catch (\Exception $e) {
            return $this->failure(message: "failed to delete data", error: $e->getMessage());
        }
    }
}
