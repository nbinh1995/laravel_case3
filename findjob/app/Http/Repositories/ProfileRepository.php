<?php

namespace App\Http\Repositories;

use App\Profile;

class ProfileRepository extends EloquentRepository implements ProfileRepositoryInterface

{
    protected $model;

    public function __construct(Profile $model)
    {
        parent::__construct($model);
    }
}
