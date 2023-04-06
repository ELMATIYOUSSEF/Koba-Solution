<?php

namespace App\Http\Controllers;

use App\Models\Camion;
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
        $camions = Camion::select('camions.*', 'users.name as driver_name')
                    ->leftJoin('users', 'users.id', '=', 'camions.idDriver')
                    ->orderBy('camions.id', 'desc')
                    ->paginate(4);
    
        return view('camions.show', ['camions' => $camions]);
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
        $validated = $request->validated();
        Camion::create($validated);
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
}
