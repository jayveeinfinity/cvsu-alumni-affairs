<?php

namespace App\Http\Controllers;

use App\Models\GoogleUserInfo;
use Exception;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    { 
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $socialiteUser = Socialite::driver('google')->user();

            // Insert google user info 
            $googleUserInfo = GoogleUserInfo::updateOrCreate([
                'email'   => $socialiteUser->email,
            ],[
                'gid'           => $socialiteUser->user['id'],
                'email'         => $socialiteUser->user['email'],
                'givenName'     => $socialiteUser->user['given_name'],
                'familyName'    => $socialiteUser->user['family_name'] ?? NULL,
                'name'          => $socialiteUser->user['name'],
                'picture'       => $socialiteUser->user['picture'],
                'verifiedEmail' => $socialiteUser->user['verified_email'],
                'hd'            => $socialiteUser->user['hd'] ?? NULL
            ]);

            $user = User::where('email', $googleUserInfo->email)->first();
            if(!$user) {
                return redirect()->route('signin')->with('message', 'Account not registered sent! To register, click "Create an account" below.');
            }
            
            Auth::login($user);
            // Temporary only. For developing admin
            if($googleUserInfo->email == 'jayveeinfinity@gmail.com') {
                return redirect()->intended('/admin')->with('message', 'Successfully signed in.');
            }

            return redirect()->intended('/user/profile')->with('message', 'Successfully signed in.');
      
        } catch (Exception $e) {
            dd($e->getMessage());   
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}