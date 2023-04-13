<?php

namespace App\Http\Controllers;
use App\Models\Camion;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    public function index(){
        $camions = Camion::join('users', 'camions.idDriver', '=', 'users.id')
                ->join('camion_types', 'camions.camion_type_id', '=', 'camion_types.id')
                ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('roles.name', 'driver')
                ->where('camions.Camion_status', 'available')
                ->where('camion_types.Camion_capacity', '>', 100)
                ->select('camions.*', 'users.*', 'users.name')
                ->get();

        return view('checkout',['camions'=>$camions]);
    }
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
