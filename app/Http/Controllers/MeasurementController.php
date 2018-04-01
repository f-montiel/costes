<?php

namespace App\Http\Controllers;

use App\Measurement;
use Illuminate\Http\Request;
use App\Http\Requests\MeasurementStore;
use App\Http\Requests\MeasurementUpdate;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurements = Measurement::get();

        return view('measurement.index', compact('measurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('measurement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeasurementStore $request)
    {
        Measurement::create([
          'name' => $request['name']
        ]);
       return redirect()->route('measurement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $measurement = Measurement::find($id);

        return view('measurement.show', compact('measurement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $measurement = Measurement::find($id);

        return view('measurement.edit', compact('measurement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(MeasurementUpdate $request, $id)
    {
        $measurement = Measurement::find($id);
        $measurement->name = $request->input('name', 'Sin Nombre');
        $measurement->save();

        return redirect()->route('measurement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Measurement::destroy($id);
        
        return redirect()-> route('measurement.index');
    }
}
