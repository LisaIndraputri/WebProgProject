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
        $user = User::find($id);
        $voter_relationship = VoterRelationship::where('vote_giver', Auth::user()->id)->where('vote_receiver', $id)->first();
        return view('profile', compact('user', 'voter_relationship'));
    }
    
}
