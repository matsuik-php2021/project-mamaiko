<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:manager');
    }

    protected function guard()
    {
        return Auth::guard('manager');
    }

    public function showRegistrationForm()
    {
        return view('manager.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:managers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        dd("create function");
        return Manager::create([
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}