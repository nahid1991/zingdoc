<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //sign up page
    public function doc_sign(){
        return view('Auth/doctor-signup');
    }

    public function pat_sign(){
        return view('Auth/patient-signup');
    }

    public function entity_sign(){
        return view('Auth/entity-signup');
    }

    public function some(RegisterRequest $request){
        return redirect('/test2');
    }

    public function login(LoginRequest $request){
        //if($this->auth->attempt($request->only('email', 'password')))
                
        if(\Auth::attempt($request->only('email', 'password')))
        {
            //echo('Its working');
            return redirect('/homepage');
        }
       
        else{
            return redirect('/sign_it')->withErrors([
                'email' => 'The credentials you entered did not match our records. Try again?',
            ]);
        }
    }

    public function getLogout(){
        \Auth::logout();
        return redirect('/');
    }

}
