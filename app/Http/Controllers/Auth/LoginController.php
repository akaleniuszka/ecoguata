<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    * Redirect the user to the Provider authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
    * Obtain the user information from the Provider.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback($provider)
    {
        // if ($provider === 'twitter') {
        //     $user = $this->createOrGetUser(Socialite::driver($provider)->userFromTokenAndSecret($token, $secret));
        // }
        $user = $this->createOrGetUser(Socialite::driver($provider)->stateless()->user(), $provider);
        Auth::login($user);

        return redirect()->to('/');
    }

    /**
    * Create or get a user based on provider id.
    *
    * @return Object $user
    */
    private function createOrGetUser($providerUser, $provider)
    {
        $account = SocialAccount::where('provider', $provider)
                    ->where('provider_user_id', $providerUser->getId())
                    ->first();

        if ($account) {
            //Return account if found
            return $account->user;
        } else {

            //Check if user with same email address exist
            $user = User::where('email', $providerUser->getEmail())->first();

            //Create user if dont'exist
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);

            }

            //Create social account
            $user->social_accounts()->create([
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $provider
                ]);

            return $user;
        }
    }
}
