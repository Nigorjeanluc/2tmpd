<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('welcome');
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
        // validate the data
        $this->validate($request, array(
            'lightSensor'          => 'required|integer',
            'flameSensor1'           => 'required|integer',
            'flameSensor2'    => 'required|integer',
            'flameSensor3'    => 'required|integer',
            'flameSensor4'           => 'required|integer',
            'celcius' => 'required|float',
            'fahrenheit' => 'required|float'
        ));

        // store in the database
        $sensor = new Sensor;

        $sensor->lightSensor = $request->lightSensor;
        $sensor->flameSensor1 = $request->flameSensor1;
        $sensor->flameSensor2 = $request->flameSensor2;
        $sensor->flameSensor3 = $request->flameSensor3;
        $sensor->flameSensor4 = $request->flameSensor4;
        $sensor->celcius = $request->celcius;
        $sensor->fahrenheit = $request->fahrenheit;

        $sensor->save();
        
        $request->session()->flash('success', 'The sensors data was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('sensors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
    public function getStorings(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'lightSensor'          => 'required|integer',
            'flameSensor1'           => 'required|integer',
            'flameSensor2'    => 'required|integer',
            'flameSensor3'    => 'required|integer',
            'flameSensor4'           => 'required|integer',
            'celcius' => 'required|float',
            'fahrenheit' => 'required|float'
        ));

        // store in the database
        $sensor = new Sensor;

        $sensor->lightSensor = $request->lightSensor;
        $sensor->flameSensor1 = $request->flameSensor1;
        $sensor->flameSensor2 = $request->flameSensor2;
        $sensor->flameSensor3 = $request->flameSensor3;
        $sensor->flameSensor4 = $request->flameSensor4;
        $sensor->celcius = $request->celcius;
        $sensor->fahrenheit = $request->fahrenheit;

        $sensor->save();
        
        $request->session()->flash('success', 'The sensors data was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('sensors.index');
    }
}
