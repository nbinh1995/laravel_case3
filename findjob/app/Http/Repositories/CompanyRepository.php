<?php

namespace App\Http\Repositories;

use App\Company;

class CompanyRepository extends EloquentRepository implements CompanyRepositoryInterface

{

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function paginate($amount)
    {
        return $this->model::with('jobs:company_id')->paginate($amount);
    }
}
