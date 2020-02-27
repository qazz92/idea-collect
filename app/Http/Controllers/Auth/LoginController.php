<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Redirect;
use Response;
use Socialite;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        $response = [];
        try {
            $url = Socialite::with('google')->stateless()->redirect()->getTargetUrl();
            $response['code'] = 200;
            $response['url'] = $url;
        } catch (\Exception $e) {
            $response['code'] = 500;
        }

        return Response::json($response);
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $social_id = $user->getId();
        $model = User::whereSocialId($social_id)->first();
        if (!$model) {
            $model = new User();
        }

        $model->name = $user->getName();
        $model->avatar = $user->getAvatar();
        $model->email = $user->getEmail();
        $model->social_id = $user->getId();

        $model->save();

        $token = $model->createToken('graphql')->accessToken;

        $front = config('app.front_url');

        return redirect($front.'?access_token='.$token);
    }
}
