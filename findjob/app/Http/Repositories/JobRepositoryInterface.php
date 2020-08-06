<?php

namespace App\Http\Repositories;

interface JobRepositoryInterface extends RepositoryInterface
{
    public function isHotJobs();
}
