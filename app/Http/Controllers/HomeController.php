<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if($role == 1){
            return Inertia::render('SuperAdmin/SuperAdminDashboard');
        }elseif($role == 2){
            return Inertia::render('Admin/AdminDashboard');
        }elseif($role == 3){
            return Inertia::render('Lecturer/LecturerDashboard');
        }else{
            return Inertia::render('Dashboard');
        }              
    }
}
