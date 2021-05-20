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
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    function post(Request $request)
    {
        $this->validator($request->all())->validate();

        $input = $request->only($this->formItems);

        //セッションに書き込む
        $request->session()->put("form_input", $input);
        dd(action($this->form_comfirm));

        return redirect()->action($this->form_confirm);
    }

    public function register(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        // 戻るボタン
        if ($request->has("back")) {
            return redirect()->action($this->form_show)
                ->withInput($input);
        }

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action($this->form_show);
        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //セッションを空にする
        $request->session()->forget("form_input");

        // 登録データーでログイン
        $this->guard()->login($user, true);

        return $this->registered($request, $user)
            ?  : redirect($this->redirectPath());
    }

    function registered(Request $request, $user)
    {
        return redirect()->action($this->form_complete);
    }

    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    public function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("Auth\RegisterController");
        }

        return view('auth/confirm', ["input" => $input]);
    }

    /*
     * 完了画面出力
     */
    public function complete()
    {
        return view('auth.register.complete');
    }

    // public function register(Request $request)
    // {
    //     $user = new \App\User;
    //     $user->name = $request->name;
    //     $user->birthday = $request->birthday;
    //     $user->address = $request->address;
    //     $user->tel = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->save();
    //     return redirect(route('register'));
    // }

    // public function confirm(Request $request)
    // {
    //     // dd($request);
    //     return view('auth/confirm', ['user' => $request]);
    // }
}
