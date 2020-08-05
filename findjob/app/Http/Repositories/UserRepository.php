<?php

namespace App\Http\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface

{
    protected $model;

    public function __construct(User $model)
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
