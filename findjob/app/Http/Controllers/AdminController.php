<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\WorkRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $userRepository;
    protected $workRepository;
    protected $companyRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        WorkRepositoryInterface $workRepository,
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->workRepository = $workRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return $this->isAdmin(view('dashboard'));
    }

    public function users()
    {
        return $this->isAdmin(view('dashboard.users'));
    }
    public function jobs()
    {
        return $this->isAdmin(view('dashboard.jobs'));
    }
    public function companies()
    {
        $companies = Company::all();
        return $this->isAdmin(view('dashboard.companies', compact('companies')));
    }

    public function isAdmin($view)
    {
        if (Auth::user()->role == 2) {
            return $view;
        } else {
            return redirect()->route('home');
        }
    }
}
