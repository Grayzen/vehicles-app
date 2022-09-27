<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = json_decode($this->callAPI("GET", "localhost:8000/api/employees", session()->get('token')));
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addEmployee = json_decode($this->callAPI("POST", "localhost:8000/api/employees", session()->get('token'), json_encode($request->all())));
        if(!@$addEmployee->status == "success"){
            foreach ($addEmployee as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }
        return redirect()->route('employee.index')->with('success', $addEmployee->message);
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
        $employee = json_decode($this->callAPI("GET", "localhost:8000/api/employees/$id", session()->get('token')));
        return view('employee.edit', compact('employee'));
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
        $updateEmployee = json_decode($this->callAPI("PUT", "localhost:8000/api/employees/$id", session()->get('token'), json_encode($request->all())));
        if(!@$updateEmployee->status == "success"){
            foreach ($updateEmployee as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }
        return redirect()->route('employee.index')->with('success', $updateEmployee->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delEmployee = json_decode($this->callAPI("DEL", "localhost:8000/api/employees/$id", session()->get('token')));
        if(!@$delEmployee->status == "success"){
            foreach ($delEmployee as $key => $value) {
                throw ValidationException::withMessages([
                    'message' => $value,
                ]);
            }
        }
        // return redirect()->back()->with(["errors" => $addEmployee->message]);
        // return redirect()->back()->with(['success' => 'Employee Successfully Created']);
        return response()->json([
            'success' => true,
            'message' => $delEmployee->message,
        ]);
    }
}
