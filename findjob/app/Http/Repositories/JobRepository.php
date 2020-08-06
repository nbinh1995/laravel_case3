<?php

namespace App\Http\Repositories;

use App\Job;
use Illuminate\Support\Collection;

class JobRepository extends EloquentRepository  implements JobRepositoryInterface

{

    public function __construct(Job $model)
    {
        parent::__construct($model);
    }

    public function paginate($amount)
    {
        return $this->model::with(['company:id,c_name,logo', 'category:id,name'])->paginate($amount);
    }

    public function isHotJobs()
    {
        return $this->model::where('hot', 1)->with(['company:id,c_name,cover_photo,logo', 'category:id,name']);
    }
}
