<?php

namespace App\Http\Repositories;

use App\Work;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class WorkRepository extends EloquentRepository  implements WorkRepositoryInterface

{

    public function __construct(Work $model)
    {
        parent::__construct($model);
    }

    public function paginate($amount)
    {
        return $this->model::with(['company:id,c_name,logo,address'])->paginate($amount);
    }

    public function isHotWorks()
    {
        return $this->model::where('hot', 1)->with(['company:id,c_name,cover_photo,logo,address']);
    }
}
