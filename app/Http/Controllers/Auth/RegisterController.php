<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserMail;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
        $rules = [
            'first_name'            => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:users',
            'username'              => 'required|min:6|max:20|unique:users',
            'password'              => 'required|min:6|max:20',
            'password_confirmation' => 'required|same:password'
        ];
        $messages = [
            'first_name.required'   => 'First Name is required',
            'last_name.required'    => 'Last Name is required',
            'email.required'        => 'Email is required',
            'email.email'           => 'Email is invalid',
            'username.required'     => 'username is required',
            'username.min'          => 'username needs to have at least 6 characters',
            'username.max'          => 'username maximum length is 20 characters',
            'password.required'     => 'Password is required',
            'password.min'          => 'Password needs to have at least 6 characters',
            'password.max'          => 'Password maximum length is 20 characters'
        ];

        return $this->validate($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $data)
    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'token' => str_random(64),
            'activated' => true
        ]);

        $role = Role::whereName('user')->first();
        $user->assignRole($role);
        return $user;
    }

    protected function register(Request $data)
    {
        $this->validator($data);
        $user = $this->create($data);

        if($user){
            Auth::login($user, true);
            Mail::to($user->email)->send(new UserMail([
                'event' => 'activated',
                'user' => $user
            ]));
        }

        return redirect('/');
    }

    protected function activated(Request $data)
    {
        $user = User::where('email', $data->email)->where('token', $data->token)->first();
        if($user){
            $user->activated = 1;
            $user->save();
        }
        return redirect('/');
    }
}
