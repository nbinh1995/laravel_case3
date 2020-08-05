<?php

namespace App\Http\Repositories;

use App\Profile;

class ProfileRepository implements ProfileRepositoryInterface

{
    protected $model;

    public function __construct(Profile $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
    }

    public function find($id)
    {
    }

    public function store($data)
    {
    }

    public function update($id, $data)
    {
    }

    public function destroy($id)
    {
    }
}
