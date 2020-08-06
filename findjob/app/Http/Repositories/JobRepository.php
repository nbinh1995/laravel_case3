<?php

namespace App\Http\Repositories;

use App\Job;
use Illuminate\Support\Collection;

class JobRepository implements JobRepositoryInterface

{
    protected $model;

    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        // return $this->model::with(
        //     [
        //         'company' => function ($query) {
        //             $query->select('id', 'logo');
        //         },
        //         'category' =>  function ($query) {
        //             $query->select('id', 'name');
        //         }
        //     ]
        // )->paginate(6);
        return $this->model::with(['company:id,c_name,logo', 'category:id,name'])->paginate(6);
    }

    public function find($id)
    {

        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->created($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->delete();
    }
}
