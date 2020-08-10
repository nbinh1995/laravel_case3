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
        return $this->model::with('works:company_id')->paginate($amount);
    }

    public function isHotCompanies()
    {
        return $this->model::where('hot', 1);
    }

    public function update($id, $data)
    {
        $id->update($data->except('logo', 'cover_photo'));
        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $imagePath = $data->file('logo');
            $path = $imagePath->store('avatar', 'public');
            $id->logo = '/storage/' . $path;
        }
        if ($data->hasFile('cover_photo') && $data->file('cover_photo')->isValid()) {
            $imagePath = $data->file('cover_photo');
            $path = $imagePath->store('cover', 'public');
            $id->cover_photo = '/storage/' . $path;
        }
        return $id->save();
    }
}
