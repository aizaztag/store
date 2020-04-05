<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Traits\Auther;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{

   // use Auther ;

    public function index()
    {
        return view('login.login');
    }

    public function registration()
    {
        return view('login.registration');
    }

    public function postLogin(LoginRequest $requestFields)
    {

        $credentials = $requestFields->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(RegistrationRequest $requestFields)
    {
        $check = $this->create($requestFields);

        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {

        if(Auth::check()){
            return view('dashboard');
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }



    public function validateUser(array $data)
    {

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}