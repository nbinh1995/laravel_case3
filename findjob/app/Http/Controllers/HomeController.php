<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\JobRepositoryInterface;
use Illuminate\Http\Request;
use App\Company;

class HomeController extends Controller
{
    const AmountJobs = 6;
    const AmountCompanies = 8;

    protected $jobRepository;
    protected $companyRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        JobRepositoryInterface $jobRepository,
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->jobRepository = $jobRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->isHotJobs()
                                    ->take(4)
                                    ->get();
        $companies = $this->companyRepository->isHotCompanies()
                                             ->take(5)
                                             ->get(['cover_photo','logo']);
        return view('home', compact('jobs', 'companies'));
    }

    public function jobs()
    {
        $jobs = $this->jobRepository->paginate(self::AmountJobs);
        return view('site.list_jobs', compact('jobs'));
    }

    public function companies()
    {
        $companies = $this->companyRepository->paginate(self::AmountCompanies);
        return view('site.list_companies', compact('companies'));
    }
}
