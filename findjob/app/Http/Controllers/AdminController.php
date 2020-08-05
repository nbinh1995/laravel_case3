<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\JobRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $user;
    protected $job;
    protected $company;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $user,
        JobRepositoryInterface $job,
        CompanyRepositoryInterface $company
    ) {
        $this->middleware('auth');
        $this->user = $user;
        $this->job = $job;
        $this->company = $company;
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
