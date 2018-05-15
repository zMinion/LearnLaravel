<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{

	public function __construct()
    {
       $this->middleware('auth');
    }

	public function saveprofile(Request $data){

        $this->validate($data, [
            'full_name'     	=> 'required|string|max:255',
            'gender' 			=> 'required|integer|max:1',
            'avatar' 			=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'place_of_birth'    => 'required|string|max:255',
            'marital_status' 	=> 'required|integer|max:1',
            'address'			=> 'required|string|max:1000',            
        ]);

        $user_id = Auth::user()->id;
        $profile = Profile::where("user_id",$user_id)->first();

        if ($profile) {}
        else{
            $profile = new Profile;
        }

        $profile->user_id = $user_id;
        $profile->full_name = $data["full_name"];                
        $profile->gender = $data["gender"];

        // handle avatar image
        if ($data->avatar) {
			$avatar = $data->file('avatar');
	        $avatar_name = time().'.'.$avatar->getClientOriginalExtension();        
	        $profile->avatar = $avatar_name;
	        $destinationPath = public_path('img'.DIRECTORY_SEPARATOR.'thumbnail_images');
	        $thumb_img = Image::make($avatar->getRealPath())->resize(150, 150);
	        $thumb_img->save($destinationPath.DIRECTORY_SEPARATOR.$avatar_name,80);
	        $destinationPath = public_path('img'.DIRECTORY_SEPARATOR.'normal_images');
	        $avatar->move($destinationPath, $avatar_name);	        	
        }

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