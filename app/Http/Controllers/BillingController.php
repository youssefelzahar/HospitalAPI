<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillingRequest;
use App\Http\Requests\UpdateBillingRequest;
use App\Http\ControllerRepo\BillingRepo;
use App\ResponseTrait;
class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ResponseTrait;
    protected $repo;
    public function __construct(BillingRepo $repo){
        $this->repo = $repo;
    }
    public function index()
    {
        $index = $this->repo->index();
        return $this->success($index);
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
    public function store(StoreBillingRequest $request)
    {
        try{
            $store = $this->repo->store($request->validated());
            return $this->success($store,'Billing created successfully');
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillingRequest $request, Billing $billing)
    {
        try{
            $update = $this->repo->update($billing->id,$request->validated());
            return $this->success($update,'Billing updated successfully');
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        try{
            $destroy = $this->repo->destroy($billing->id);
            return $this->success($destroy,'Billing deleted successfully');
        }catch(\Exception $e){
            return $this->failure($e->getMessage(),'error');
        }
    }
}
