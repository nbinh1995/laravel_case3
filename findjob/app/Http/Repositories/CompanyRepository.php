<?php

namespace App\Http\Repositories;

use App\Company;

class CompanyRepository implements CompanyRepositoryInterface

{
    protected $model;

    public function __construct(Company $model)
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
