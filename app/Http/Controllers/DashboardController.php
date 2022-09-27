<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = $this->callAPI('GET', 'http://localhost:8000/api/employees', session()->get('token'));
        $vehicles = $this->callAPI('GET', 'http://localhost:8000/api/vehicles', session()->get('token'));
        $undeptVehicles = 0;
        $undeptVehiclesCount = 0;
        $vehicleYears = [];
        $undeptVehicles = [];
        foreach (json_decode($vehicles) as $key => $vehicle) {
            if($vehicle->employee_id == NULL){
                $undeptVehiclesCount++;
                $undeptVehicles[] = $vehicle;
            }
            $years[] = $vehicle->year;
        }
        sort($years);
        $get = array_count_values($years);
        foreach ($get as $year => $times) {
            $vehicleYears[] = $year;
            $vehicleTimes[] = $times;
        }
        return view('dashboard', ['totalEmployees' => count(json_decode($employees)), 'totalVehicles' => count(json_decode($vehicles)), 'undeptVehiclesCount' => $undeptVehiclesCount, 'vehicleYears' => $vehicleYears, 'vehicleTimes' => $vehicleTimes, 'undeptVehicles' => $undeptVehicles]);
    }
}
