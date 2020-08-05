<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\JobRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $job;
    protected $company;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        JobRepositoryInterface $job,
        CompanyRepositoryInterface $company
    ) {
        // $this->middleware('auth');
        $this->job = $job;
        $this->company = $company;
    }

    public function index()
    {
        return view('home');
    }

    public function jobs()
    {
        $jobs = $this->job->paginate();
        return view('site.list_jobs', compact('jobs'));
    }

    public function companies()
    {
        return view('site.list_companies');
    }
}
