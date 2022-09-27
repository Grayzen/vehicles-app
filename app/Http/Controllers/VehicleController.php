<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = json_decode($this->callAPI("GET", "localhost:8000/api/vehicles", session()->get('token')));
        return view('vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = json_decode($this->callAPI("GET", "localhost:8000/api/employees", session()->get('token')));
        return view('vehicle.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $addVehicle = json_decode($this->callAPI("POST", "localhost:8000/api/vehicles", session()->get('token'), json_encode($request->all())));
        if(!@$addVehicle->status == "success"){
            foreach ($addVehicle as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }

        return redirect()->route('vehicle.index')->with('success', $addVehicle->message);
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
        $employees = json_decode($this->callAPI("GET", "localhost:8000/api/employees", session()->get('token')));
        $vehicle = json_decode($this->callAPI("GET", "localhost:8000/api/vehicles/$id", session()->get('token')));
        return view('vehicle.edit', compact('employees', 'vehicle'));
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
        $vehicleUpdate = json_decode($this->callAPI("PUT", "localhost:8000/api/vehicles/$id", session()->get('token'), json_encode($request->all())));
        if(!@$vehicleUpdate->status == "success"){
            foreach ($vehicleUpdate as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }
        return redirect()->route('vehicle.index')->with('success', $vehicleUpdate->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delVehicle = json_decode($this->callAPI("DEL", "localhost:8000/api/vehicles/$id", session()->get('token')));
        if(!@$delVehicle->status == "success"){
            foreach ($delVehicle as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }
        // return redirect()->back()->with(["errors" => $addEmployee->message]);
        // return redirect()->back()->with(['success' => 'Employee Successfully Created']);
        return response()->json([
            'success' => true,
            'message' => 'Vehicle Successfully Deleted',
        ]);
    }
}
