<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'phone' => ['required','numeric'],
            'address' => ['required'],
            'dob' => ['required'],
            'gender'=>['required'],
            'avatar'=>'image|mimes:jpg, jpeg,png',
            'agree' =>['required'],
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
            'phone' =>$data['phone'],
            'address' =>$data['address'],
            'dob' =>$data['dob'],
            'gender' => $data['gender'],
            'avatar' => $data['avatar'],
            'agree' => $data['agree'],
            'popularity_positive' => 0,
            'popularity_negative' => 0,
        ]);
    }
 

    public function store_avatar(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|numeric',
            'address' => 'required',
            'dob' => 'required',
            'gender'=>'required',
            'agree' =>'required',
        ]);

        if($validator->fails() || !$request->hasFile('avatar')){
            return back()->withErrors($validator);
        }

        // Old upload
        // $avatar = $request->file('avatar');
        // $filename = time(). '.' . $avatar->getClientOriginalExtension();
        // Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' .$filename));

        // New upload
        $path = substr($request->file('avatar')->store('public/avatars'), 7);

        $date = Carbon::createFromFormat('m/d/Y', $request->dob);
        $default = 0;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $date,
            'gender' => $request->gender,
            'avatar' => $path,
            'agree' => $request->agree,
            'popularity_positive' => $default,
            'popularity_negative' => $default,
        ]);
        
        return redirect()->route('login');
    }
}
