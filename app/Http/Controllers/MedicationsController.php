<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationsRequest;
use App\Http\Requests\UpdateMedicationsRequest;
use App\Http\ControllerRepo\MedicineRepo;
use App\ResponseTrait;
class MedicationsController extends Controller
{
    use ResponseTrait;
    protected $repo;
    public function __construct(MedicineRepo $repo){
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = $this->repo->index();
        return $this->success($medications);
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
    public function store(StoreMedicationsRequest $request)
    {
        try{
            $medications = $this->repo->store($request->validated());
            return $this->success($medications,'Medication created successfully');
            
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medications $medications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medications $medications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationsRequest $request, Medications $medications)
    {
        try{
            $medications = $this->repo->update($medications->id,$request->validated());
            return $this->success($medications,'Medication updated successfully');
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medications $medications)
    {
        try{
            $medications = $this->repo->destroy($medications->id);
            return $this->success($medications,'Medication deleted successfully');
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }
    public function filterByQuantity(UpdateMedicationsRequest $request)
    {
        $request->validate([
            'max_quantity' => 'required|integer|min:1',
        ]);

        
        return $this->success($this->repo->filterByQuantity($request->max_quantity));
    }
}
