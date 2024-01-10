<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role;

        if($role == 1){
            return Inertia::render('SuperAdmin/Dashboard');
        }
        elseif($role == 2){
            return Inertia::render('Admin/Dashboard');
        }
        elseif($role == 3){
            return Inertia::render('Lecturer/Dashboard');
        }
        elseif($role == 0){
            return Inertia::render('Student/Dashboard');
        }
        else{
            return Inertia::render('Student/Dashboard');
        }              
    }
}


