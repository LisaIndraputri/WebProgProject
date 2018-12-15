<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VoterRelationship;
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
}
