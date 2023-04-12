<?php

namespace App\Http\Controllers;

use App\Models\CamionType;
use Illuminate\Http\Request;

class CamionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camion = CamionType::all();
        dd($camion);
        return view('settings.show',['camions'=>$camion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Camion_type' =>'required|string|max:30',
            'Camion_capacity' =>'required|integer',
        ]);
        
        CamionType::create($validated);
        return redirect()
            ->back()
            ->with('success', 'CamionType is submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camion = CamionType::with('camionType')->find($id);
        return view('settings.show',['camions'=>$camion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camion = CamionType::findOrFail($id);
        $camion-> delete();
        return redirect()
        ->back()
        ->with('success', 'camionType has been deleted !!');
    }
}
