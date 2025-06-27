<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $provider)
    {

        if (!in_array($provider, ['github', 'google', 'facebook'])) {
            return redirect(route('login'))->withErrors(['provider' => 'Unsupported provider.']);
        }

        $socialUser = Socialite::driver($provider)->user();



        $user = User::updateOrCreate([

            'provider_id' => $socialUser->id,
            'provider' => $provider,

        ], [

            'name' => $socialUser->getName(),


            'email' => $socialUser->email,

            'provider_token' => $socialUser->token,

            'provider_refresh_token' => $socialUser->refreshToken,

        ]);



        Auth::login($user);



        return redirect('/dashboard');
    }
}
