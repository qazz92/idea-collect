<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTokenRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    public function token(UserTokenRequest $request) {
        try {
            $user_no = $request->id;

            $user = User::find($user_no);

            $response['code'] = 200;
            $response['token'] = $user->createToken('accessToken')->accessToken;

        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['msg'] = $e->getMessage();
        }
        return Response::json($response);
    }
}
