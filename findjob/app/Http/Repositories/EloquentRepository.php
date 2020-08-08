<?php

namespace App\Http\Repositories;

use Illuminate\Support\Collection;

class EloquentRepository implements RepositoryInterface

{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function paginate($amount)
    {
        return $this->model->paginate($amount);
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
