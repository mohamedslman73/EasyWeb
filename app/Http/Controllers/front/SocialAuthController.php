<?php

namespace App\Http\Controllers\front;

use Socialite;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if ($provider == 'twitter') {
            $user = Socialite::driver($provider)->user();
        } else {
            $user = Socialite::driver($provider)->stateless()->user();
        }
        //dd($user);
        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::Logout();
        //return Auth::user();

        Auth::login($authUser, true);
        //return Auth::user();
        return redirect('/');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
        'name'        => $user->name,
        'email'       => $user->email,
        'provider'    => $provider,
        'provider_id' => $user->id
    ]);
    }
}
