<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;
            $request->session()->put('username',$user->name);
            $request->session()->put('email',$user->email);
            $request->session()->put('facebook_id',$user->id);
           
            
            //print_r($create);
            //exit();
            //$userModel = new User;
            //$createdUser = $userModel->addNew($create);
           // Auth::loginUsingId($createdUser->id);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
       
    }
}
