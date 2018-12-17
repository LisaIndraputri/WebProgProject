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
        
        if($request->hasFile('avatar'))
        {   
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' .$filename));
            
            $default = 0;
            $user = New User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone =$request->phone;
            $user->address =$request->address;
            $user->dob =$request->dob;
            $user->gender = $request->gender;
            $user->avatar = $filename;
            $user->agree = true;
            $user->popularity_positive = $default;
            $user->popularity_negative = $default;
            $user->save();
        }

        return view('user.index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('userprofile.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $avatar = $request->file('avatar');
        $filename = time(). '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' .$filename));
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->avatar = $filename;
        $user->admin = $user->admin;
        $user->agree = 'agree';
        $user->save();
        return redirect('profile/'.$id);
    }
}
