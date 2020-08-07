<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\SocialAccount;

class SocialController extends Controller {
    public function oauthRedirect($provider) {
        return Socialite::with($provider)->redirect();
    }

    public function login($provider) {
        $socialiteUser = Socialite::with($provider)->user();
        $user = $this->findOrCreateUser($provider, $socialiteUser);
        Auth()->login($user, true);
        return redirect()->route('home');
    }

    protected function findOrCreateUser($provider, $socialiteUser) {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }

        if ($user = User::where('email', $socialiteUser->getEmail())->first()) {
            $this->addSocialAccount($provider, $user, $socialiteUser);

            return $user;
        }

        $user = User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'password' => Hash::make(str::random(25)),
        ]);

        $this->addSocialAccount($provider, $user, $socialiteUser);

        return $user;
    }

    protected function findUserBySocialId($provider, $id) {
        $socialAccount = SocialAccount::where('provider', $provider)->where('provider_id', $id)->first();

        return $socialAccount ? $socialAccount->user : false;
    }

    protected function addSocialAccount($provider, $user, $socialiteUser) {
        SocialAccount::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
        ]);
    }
}
