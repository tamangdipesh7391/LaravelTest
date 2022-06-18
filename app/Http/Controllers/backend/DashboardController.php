<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function login()
    {
        return view('backend.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    
        
}
