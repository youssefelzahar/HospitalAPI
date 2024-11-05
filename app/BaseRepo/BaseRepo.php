<?php
namespace App\BaseRepo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB; 
use App\Interface\BaseInterfcae;
class BaseRepo implements BaseInterfcae
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $cacheKey = 'all_' . class_basename($this->model);

        // Use Cache::remember to cache the results
        return Cache::remember($cacheKey, 3600, function () {
            return $this->model->all();
        });
    }

    public function store(array $data){
        return DB::transaction(function () use ($data) {
            $creates=$this->model->create($data);
            Cache::forget($this->model->getTable());
            return $creates;
        },5);
    }

    public function update($id, array $data){
        return DB::transaction(function () use ($data, $id) {
            $updates=$this->model->find($id)->update($data);
            Cache::forget($this->model->getTable());
            return $updates;
        },5);
    }

    public function destroy($id){
        return DB::transaction(function () use ($id) {
            $model = $this->model->find($id);
    
            if ($model) {
                $model->delete();
                Cache::forget($this->model->getTable());
                return true;
            }
    
            return false;
        }, 5);
    }
 
    
}