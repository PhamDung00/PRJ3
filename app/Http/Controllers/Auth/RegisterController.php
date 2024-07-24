<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

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
            'phone' => ['required','unique:users,phone'],
            'gender' => ['required'],

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function myRegister(Request $request){
        // $request->validate([
        //     "email" => "required|email",
        //     "phone" => "required",
        // ]);
        // check if email and phone number are in use
        $oldUser = User::where("email", $request->email)->orWhere("phone", $request->phone)->first();
        if($oldUser){
            // return response()->json($oldUser, 200);
            return back()->with("error","Email or phone number already in use");
        }
        // check if password and repeat password are the same
        if($request->input("password") != $request->input("password_confirmation")){
            return back()->with("error","Password and repeat password are not the same");
        }
        $user = User::create(array_merge($request->all(),[
            "password"=>Hash::make($request->input("password")),
        ]));
        return back()->with("success","Register success");
    }
}