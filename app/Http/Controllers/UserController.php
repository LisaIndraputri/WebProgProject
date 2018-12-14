<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
class UserController extends Controller
{
    //
    public function profile($id)
    {
        $user = User::find($id);
        return view('profile', compact('user'));
    }
    
}
