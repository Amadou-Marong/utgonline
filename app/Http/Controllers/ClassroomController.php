<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClassroomController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Classroom/Index');
    }
}
