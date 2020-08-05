<?php

namespace App\Http\Repositories;

use App\Job;

class JobRepository implements JobRepositoryInterface

{
    protected $model;

    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return $this->model::paginate(6);
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
