<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VoterRelationship;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;
class UserController extends Controller
{
    //
    public function profile($id)
    {   
        $login_user = 0;
        if(Auth::user() != null){
            $login_user = Auth::user()->id;
        }
        $user = User::find($id);
        $voter_relationship = VoterRelationship::where('vote_giver', $login_user)->where('vote_receiver', $id)->first();
        return view('profile', compact('user', 'voter_relationship'));
    }
    
    public function index(){
        if(Auth::user() != null){
            if(Auth::user()->admin == 0){
                return redirect('forum');
            }
        }

        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }

    public function destroy($user_id){
        $user = User::find($user_id);
        $user->delete();
        return back();
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
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

        if($request->hasFile('avatar'))
        {   
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' .$filename));
            
            $default = 0;
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' =>$request->phone,
                'address' =>$request->address,
                'dob' =>$request->dob,
                'gender' => $request->gender,
                'avatar' => $filename,
                'agree' => $request->agree,
                'popularity_positive' => $default,
                'popularity_negative' => $default,
            ]);
        }

        return redirect('user');
    }
}
