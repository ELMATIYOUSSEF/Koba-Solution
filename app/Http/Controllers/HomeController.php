<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Gate;


use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function redirect()
    {
        if (Gate::allows('admin')) {
            return view('dashboard.index');
        }
    
        if (Gate::allows('driver')) {
            return view('dashboard.index');
        }
    
        if (Gate::allows('client')) {
            return view('home');
        }

        return view('home');
    }
}
