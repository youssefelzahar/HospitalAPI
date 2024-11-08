<?php

namespace App\Http\Controllers;

use App\Models\Treatments;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatmentsRequest;
use App\Http\Requests\UpdateTreatmentsRequest;
use App\ResponseTrait;
use App\Http\ControllerRepo\TreatmentsRepo;
class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ResponseTrait;
    protected $repo;
    public function __construct(TreatmentsRepo $repo){
        $this->repo = $repo;
    }
    public function index()
    {
        $treatments = $this->repo->index();
        return $this->success($treatments);
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
    public function store(StoreTreatmentsRequest $request)
    {
        try{

            $data=$this->repo->store($request->validated());
            return $this->success(data:$data,message:"Treatment created successfully");
        }catch(\Exception $e){
              return $this->failure(message:"error",error:$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatments $treatments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatments $treatments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTreatmentsRequest $request, Treatments $treatments)
    {
        try{
            $treatments=$this->repo->update($treatments->id,$request->validated());
            return $this->success(data:$treatments,message:"Treatment updated successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatments $treatments)
    {
        try{
            $treatments=$this->repo->destroy($treatments->id);
            return $this->success(data:$treatments,message:"Treatment deleted successfully");
        }catch(\Exception $e){
            return $this->failure(message:"error",error:$e->getMessage());
        }
    }
}
