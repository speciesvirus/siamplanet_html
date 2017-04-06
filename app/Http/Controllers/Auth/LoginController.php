<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function index()
    {
        return view('login');
    }
    public function login(Request $data)
    {

        $this->validator($data);

        $user = User::where('username', $data->user)->first();
        if($user->activated != 1) return redirect()->back()->withInput()->with(['alert-message' => 'Open your email and click the link to activate your account.', 'code' => '1']);
        if (Auth::attempt(['username' => $data['user'], 'password' => $data['pass'], 'activated' => 1], true)) {
            return redirect()->route('home');
        }
        return redirect()->back()->withInput()->with(['alert-message' => 'Username or Password not found!', 'code' => '1']);
        //return redirect()->route('login')->with(['alert-message' => 'username or password not found!', 'code' => '1']);
    }
    protected function validator(Request $data)
    {
        $rules = [
            'user'              => 'required|min:6|max:20',
            'pass'              => 'required|min:6|max:20'
        ];
        $messages = [
            'user.required'     => 'username is required',
            'user.min'          => 'username needs to have at least 6 characters',
            'user.max'          => 'username maximum length is 20 characters',
            'pass.required'     => 'Password is required',
            'pass.min'          => 'Password needs to have at least 6 characters',
            'pass.max'          => 'Password maximum length is 20 characters'
        ];
        return $this->validate($data, $rules, $messages);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

}
