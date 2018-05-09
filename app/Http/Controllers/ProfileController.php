<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;

class ProfileController extends Controller
{

	public function __construct()
    {
       $this->middleware('auth');
    }

	public function saveprofile(Request $data){

        $user_id = Auth::user()->id;
        $profile = Profile::where("user_id",$user_id)->first();
        
        if ($profile) {}
        else{
            $profile = new Profile;
        }

        $profile->user_id = $user_id;
        $profile->full_name = $data["full_name"];                
        $profile->gender = $data["gender"];
        $profile->place_of_birth = $data["place_of_birth"];
        $profile->marital_status = $data["marital_status"];
        $profile->address = $data["address"];
        $profile->save();
    	return view('profile',["profile" => $profile]);
    }

    public function editprofile()
    { 
        $user_id = Auth::user()->id;
        $profile = Profile::where("user_id",$user_id)->first();
    	return view('profile',["profile" => $profile]);
    }
}