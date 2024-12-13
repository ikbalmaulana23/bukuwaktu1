<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Socialite as ModelSocialite;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $authuser = $this->store($socialUser, $provider);

        Auth::login($authuser);
        return redirect('/posts');
    }

    public function store($socialUser, $provider)
    {
        $socialAccount = ModelSocialite::where('provider_id', $socialUser->getId())->where('provider_name', $provider)->first();

        if (!$socialAccount) {
            $user = User::where('email', $socialUser->getEmail())->first();
            if (!$user) {
                $user = User::updateOrCreate([
                    'name' => $socialUser->getName() ? $socialUser->getName() : $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                ]);

                $user->socialite()->create([
                    'provider_id' => $socialUser->getId(),
                    'provider_name' => $provider,
                    'provider_token' => $socialUser->token,
                    'provider_refresh_token' => $socialUser->refreshToken,
                ]);
            }
            return $user;
        }
        return $socialAccount->user;
    }
}
