<?php

namespace App\Http\Repositories;

interface ProfileRepositoryInterface
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
