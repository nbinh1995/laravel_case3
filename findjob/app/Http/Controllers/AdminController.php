<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\ProfileRepositoryInterface;
use App\Http\Repositories\WorkRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $userRepository;
    protected $workRepository;
    protected $companyRepository;
    protected $profileRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        WorkRepositoryInterface $workRepository,
        CompanyRepositoryInterface $companyRepository,
        ProfileRepositoryInterface $profileRepository
    ) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->workRepository = $workRepository;
        $this->companyRepository = $companyRepository;
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        if (Auth::user()->role == 2) {
            $user_count = $this->userRepository->all()->count();
            $work_count = $this->workRepository->all()->count();
            $company_count = $this->companyRepository->all()->count();
            $profile_count = $this->profileRepository->all()->count();
            return view('dashboard', compact('user_count', 'work_count', 'company_count', 'profile_count'));
        } else {
            return redirect()->route('home');
        }
    }

    public function users()
    {
        if (Auth::user()->role == 2) {
            $user_count = $this->userRepository->all()->count();
            $work_count = $this->workRepository->all()->count();
            $company_count = $this->companyRepository->all()->count();
            $profile_count = $this->profileRepository->all()->count();
            return view('admin.users_admin', compact('user_count', 'work_count', 'company_count', 'profile_count'));
        } else {
            return redirect()->route('home');
        }
    }
    public function jobs()
    {
        if (Auth::user()->role == 2) {
            $user_count = $this->userRepository->all()->count();
            $work_count = $this->workRepository->all()->count();
            $company_count = $this->companyRepository->all()->count();
            $profile_count = $this->profileRepository->all()->count();
            return view('admin.jobs_admin', compact('user_count', 'work_count', 'company_count', 'profile_count'));
        } else {
            return redirect()->route('home');
        }
    }
    public function companies()
    {
        if (Auth::user()->role == 2) {
            $user_count = $this->userRepository->all()->count();
            $work_count = $this->workRepository->all()->count();
            $company_count = $this->companyRepository->all()->count();
            $profile_count = $this->profileRepository->all()->count();
            return view('admin.companies_admin', compact('user_count', 'work_count', 'company_count', 'profile_count'));
        } else {
            return redirect()->route('home');
        }
    }
}
