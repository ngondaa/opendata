<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;



class ProviderRedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $provider)
    {
        if(!in_array($provider,['github', 'google', 'facebook'])) {
            return redirect(route('login'))->withErrors(['provider' => 'Unsupported provider.']);
        }

        try{
        return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect(route('login'))->withErrors(['provider' => 'Error redirecting to provider: ' . $e->getMessage()]);
        }
    }
}
