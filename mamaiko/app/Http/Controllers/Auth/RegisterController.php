<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     //使ってません。saveメソッド使ってます。
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'birthday' => $data['birthday'],
            'tel' => $data['tel'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register()
    {
        return view('auth/register');
    }
    public function confirm(Request $request)
    {
        $today = date("Y-m-d");
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'tel' => 'required |  regex:/^[0-9]+$/ | digits_between:8,11|unique:users',
            'birthday' => 'required|date|before:'.$today,
        ]);
        return view('auth/confirm', ['user' => $request]);
    }

    public function save(Request $request)
    {
        $user = new \App\User;
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return view('auth/save');
    }


}
