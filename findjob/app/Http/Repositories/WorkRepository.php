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

    public function isHotWorks($num)
    {
        return $this->model::where('hot', 1)->with(['company:id,c_name,cover_photo,logo,address'])->take($num)->get();
    }

    public function store($data)
    {
        $input = $data->all();
        if (isset($data->status)) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }
        $input['slug'] = Str::slug($data->title);
        return $this->model->create($input);
    }
}
