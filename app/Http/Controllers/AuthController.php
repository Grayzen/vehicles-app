<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $data_array =  array(
            "email"        => $request->email,
            "password"         => $request->password,
        );
        $make_call = $this->callAPI('POST', 'http://localhost:8000/api/login', false, json_encode($data_array));

        $response = json_decode($make_call, true);
        if(!empty($response["access_token"])){
            session()->put('token', $response["access_token"]);
            return redirect()->route('dashboard');
        }
        else{
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
    public function registerPage()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $data_array =  array(
            "email"        => $request->email,
            "password"         => $request->password,
        );
        $make_call = $this->callAPI('POST', 'http://localhost:8000/api/register', false, json_encode($data_array));

        $response = json_decode($make_call, true);
        if(!empty($response["access_token"]))
            return redirect()->route('dashboard');
        else{
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        // $request->session()->regenerate();
    }

    public function logout()
    {
        $make_call = $this->callAPI('POST', 'http://localhost:8000/api/logout');
        session()->flush();
        return view('login');
    }
}
