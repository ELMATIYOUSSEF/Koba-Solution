<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Camion;
use App\Models\CamionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreCamionRequest;
use App\Http\Requests\UpdateCamionRequest;

class CamionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'driver');
        })->get();
        $camionTypes = CamionType::all();

        $camions = Camion::with('camionType', 'users')
                    ->orderBy('id', 'desc')
                    ->paginate(4);
        return view('camions.show', compact('camions', 'users','camionTypes'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.addCamion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCamionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCamionRequest $request)
    {
        $data = $request->validated();
        $camiontypeid = $request->camion_type_id;
        $capacity = DB::select('SELECT Camion_capacity FROM camion_types WHERE id = ? LIMIT 1', [$camiontypeid]);
        $capCamion =$capacity[0]->Camion_capacity;
        $data['Capacity_disponible'] = $capCamion;
         $camion =Camion::create($data);
       
        return redirect()
            ->back()
            ->with('success', 'camion is submitted!');
    }


    public function getCamionById($id)
    {
        $camion = Camion::findOrFail($id);

        return response()->json($camion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function show(Camion $camion)
    {
        return view('Camions.show',['camion' => $camion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function edit(Camion $camion)
    {
        return view('camions.edit',['camion' => $camion]);
        dd($camion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCamionRequest  $request
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCamionRequest $request )
    {
       
        $validated = $request->validated();
        $id = $validated['idcamion'];
        $camion = Camion::findOrFail($id);
        $camion->update($validated);
        return redirect()
        ->back()
        ->with('success', 'camion is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camion $camion)
    {
        $camion-> delete();
        return redirect()
        ->back()
        ->with('success', 'camion has been deleted !!');
    }

    public function updateStatus(Request $request)
    {
        $camionId = $request->id;
        $status = $request->status;
        ($status=='available')?$bol = true : $bol =false ;
        $camion = Camion::find($camionId);
        $camion->Camion_status = $status;
        $camion->save();
    
        return response()->json(['success' => true , 'bol'=>$bol]);
    }
}
